<?php

namespace App\Model;

use Nette,
        Nette\Utils\Random,
	Nette\Security\Passwords,
        App\Helper\Helper,
        Nette\Utils\Image;


/**
 * Users management.
 */
class UserManager extends Manager implements Nette\Security\IAuthenticator{
    
	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;

		$row = $this->userDat()->where('nickName = ? OR mail = ?', $username, $username)->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('Nesprávné uživatelské jméno nebo mail.', self::IDENTITY_NOT_FOUND);

		} elseif (!Passwords::verify($password, $row['password'])) {
			throw new Nette\Security\AuthenticationException('Nesprávné heslo.', self::INVALID_CREDENTIAL);

		} elseif (Passwords::needsRehash($row['password'])) {
			$row->update(array(
				'password' => Passwords::hash($password),
			));
		}

		$arr = $row->toArray();
		unset($arr['password']);
		return new Nette\Security\Identity($row['id'], $row['permissions'], $arr);
	}


	/**
	 * Adds new user.
	 * @param  string
         * @param  string
	 * @param  string
	 */
        public function registerNew($mail, $password, $nickName = ''){
            if($this->checkName($mail, 'mail')){
                throw new \Exception('Použitý mail, klikněte na ztracené heslo');
            }
            
            if($nickName){
                if($this->checkName($nickName, 'nickName')){
                    throw new \Exception('Obsazené jméno');
                }
            }
                   
            $checkCode = $this->genCheckCode('checkCode');
            
            $this->userDat()->insert(array(
                'password' => Passwords::hash($password),
                'nickName' => $nickName?$nickName:NULL,               
                'mail' => $mail,
                'registerTime' => Helper::datTime(),
                'born' => Helper::datTime(),
                'checkCode' => $checkCode,
                'wall' => 0,
                'permissions' => '000000000000',
                'deleted' => 0,
                'gender' => 'no',
            ));
            
            (new SendMailManager())->sendWelcomeMail($mail, $checkCode);
            
        }
        
        /**
         * Check availability of data in database
         * @param string $name
         * @return Nette\Database\Context
         */
        private function checkName($check, $column){
            return $this->userDat()
                    ->where($column, $check)->count();           
        }
        
        /**
         * Generate mail check code
         * @return string
         */
        private function genCheckCode($column){
            
            $random = Random::generate(15, '0-9a-z');
            
            if($this->userDat()->where($column, $random)->count() == 0){
                return $random;
            }
            
            return $this->genCheckCode($column);
        }
                      
        /**
         * Check email from user
         * @param string $id
         * @return int
         */
        public function confimNewUser($id){
            
            return $this->userDat()
                    ->where('checkCode', $id)
                    ->update(['checkCode' => 'checked']);
        }
        
        /**
         * Check if lost password mail exists in database
         * @param string $mail
         */
        public function lostPassword($mail){

            $user = $this->userDat()->where('mail', $mail)->fetch();
            
            if(!$user){
                throw new Nette\Security\AuthenticationException('Takový mail není registrován');
            }
            
            $checkCode = $this->genCheckCode('lostPasswordCode');
            
            $this->userDat()->update(['lostPasswordCode' => $checkCode, 'lostPasswordCodeTime' => Helper::datTime()]);
            
            (new SendMailManager())->sendNewPassword($mail, Helper::combineUserName($user), $checkCode);
                        
        }
        
        /**
         * Check if pass code is OK and returns name of user
         * @param string $lostPasswordCode
         * @return string
         */
        public function newPasswordCheck($lostPasswordCode){
            
            $data = $this->userDat()->where('lostPasswordCode', $lostPasswordCode)
                    ->fetch();
            
            if(!$data){
                return false;
            }
            
            $timeDiff = (new \Nette\Utils\DateTime(Helper::datTime()))
                            ->diff($data->lostPasswordCodeTime);
            
            if($timeDiff->y == 0 && $timeDiff->m == 0 && $timeDiff->d <= 2){
                return Helper::combineUserName($data, false);
            }
            
            return false;
        }
        
        /**
         * Set new password
         * @param string $mail
         */
        public function newPassword($lostPasswordCode, $mail, $password){
            
            $data = $this->userDat()->where('lostPasswordCode', $lostPasswordCode)
                    ->fetch();
            
            if($data->mail != $mail){
                throw new \Exception('Toto není mail, který jste použili k registraci');
            }
            
            $this->userDat()->update(['lostPasswordCode' => null, 
                                      'lostPasswordCodeTime'=>null, 
                                      'password' => Passwords::hash($password)]);
            
            
        }
        
        /**
         * Update user data from form
         * @param type $values
         * @param User $user
         */
        public function updateUser($values, $user){
            
            $crash = false;
            
            if($values['nickName']){
                
                $NNusr = $this->userDat()->where('nickName', $values['nickName'])->fetch();
                
                if($NNusr && $NNusr->id != $user->id){
                    $values['nickName'] = '';
                    $crash = 'Již zabrané přihlašovací jméno';
                }
                
            }
            else{
                $values['nickName'] = null;
            }
            
            $valid =  array('about', 'nickName', 'name', 'born', 'gender', 'wall', 'mailList');       
            foreach($valid as $key){
                $user->$key = $values[$key];
                $data[$key] = $values[$key];
            }           
            
            if($values['photo']->isOK()){
                $photo = $this->genName($values['photo'], $user->name);
                $this->savePhoto($photo);                
                               
                if($user->photo){
                    $this->delOldPhoto($user->photo);
                }
                
                $data['photo'] = $photo['name'];
                $user->photo = $photo['name'];
            }         
            $this->userDat()->where('id', $user->id)->update($data);
            
            if($crash){
                throw new \Exception($crash);
            }
        }
        
        /**
         * Saves photo
         * @param string $name
         * @return type
         */
        private function savePhoto($name){
            
            $www = __DIR__.'/../../www/user-photo/';

            $image = Image::fromFile($name['temp']); 
            $image->save($www.$name['name']); 
                       
            $image->resize(80, NULL);            
            
            $image->save($www.$name['nameMin']);  
            
            return $name['name'];
        }       
        
        /**
         * Generates name for photo
         * @param string $photo
         * @param string $id
         * @return array
         */
        private function genName($photo, $id){  
            
            $www = __DIR__.'/../../www/user-photo/';
            
            $rand1 = Random::generate(3);
            $rand2 = Random::generate(5);
            
            $ext = '.'.pathinfo($photo->getName(), PATHINFO_EXTENSION);
            $nameMin = $rand1.$id.$rand2.'-min'.$ext;
            $name = $rand1.$id.$rand2.$ext;
            
            if(file_exists($www.$name)){
                return $this->genName($photo, $id);
            }
            else{
                return array('nameMin' => $nameMin, 'name' => $name, 'temp' => $photo->getTemporaryFile());
            }
            
        }
        
        /**
         * Deletes old photo from disk
         * @param type $photo
         */
        private function delOldPhoto($photo){
            
            $www = __DIR__.'/../../www/user-photo/';  
            
            $ext = '.'.pathinfo($photo, PATHINFO_EXTENSION);
            $file = pathinfo($photo, PATHINFO_FILENAME);
            
            unlink($www.$file.'-min'.$ext);
            unlink($www.$photo);
            
        }
        
        /**
         * Deletes photo from disk, database and cache
         * @param User $user
         */
        public function delPhoto($user){     
                       
            $this->delOldPhoto($user->photo);
            
            $this->userDat()->where('id', $user->id)->update(['photo' => '']);
            $user->photo = '';
        }
        
        /**
         * Shortcut for database
         * @return Nette\Database\Context
         */
        private function userDat(){
            
            return $this->database->table('user');
        }

}



class DuplicateNameException extends \Exception
{}
