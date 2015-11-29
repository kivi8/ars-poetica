<?php

namespace App\Model;

use Nette,
        Nette\Utils\Random,
	Nette\Security\Passwords,
        App\Helper\Helper,
        Nette\Utils\Image,
        Nette\Security\AuthenticationException;


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
			throw new AuthenticationException('Nesprávné uživatelské jméno nebo mail.', self::IDENTITY_NOT_FOUND);

		} elseif (!Passwords::verify($password, $row['password'])) {
			throw new AuthenticationException('Nesprávné heslo.', self::INVALID_CREDENTIAL);

		} elseif (Passwords::needsRehash($row['password'])) {
			$row->update(array(
				'password' => Passwords::hash($password),
			));
                } elseif($row['deleted']){
                    throw new AuthenticationException('Zablokovaný účet', self::INVALID_CREDENTIAL);
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
                'born' => '1970-1-1',
                'checkCode' => $checkCode,
                'wall' => 0,
                'permissions' => '00|00|000|00|0000|000|000|0',
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
        public function checkName($check, $column){
            return $this->userDat()
                    ->where($column, $check)->count();           
        }
        
        /**
         * Generate mail check code
         * @return string
         */
        private function genCheckCode($column, $lenght = 15){
            
            $random = Random::generate($lenght, '0-9a-z');
            
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
                throw new AuthenticationException('Takový mail není registrován');
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

            if(is_numeric($user)){
                $id = $user;
                $user = $this->userDat()->get($id);
            }
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
            
            if(isset($values['permissions'])){
                $valid[] = 'permissions';
            }
            
            if(isset($values['title'])){
                $valid[] = 'title';
            }
            
            foreach($valid as $key){
                
                if(!isset($id)){
                    $user->$key = $values[$key];
                }
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
            $this->updateUserDat($user->id, $data);
            
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
         * Returns list of all users
         * [id => name]
         * @return Nette\Database\Context
         */
        public function getUserList(){
            
            $allUser = $this->userDat()->fetchAll();
            
            $users = [];
            $deleted = [];
            
            foreach ($allUser as $user){
                
                if($user->deleted){
                    $deleted[$user->id] = Helper::combineUserName($user);
                }
                else{
                    $users[$user->id] = Helper::combineUserName($user);
                }
            }
            
            return ['allowed' => $users, 'deleted' => $deleted];            
        }
        
        /**
         * Returs user data by ID
         * @param int $id
         * @return Nette\Database\Context
         */
        public function getUserData($id){
            
            return $this->userDat()->where('id', $id)->fetch();
        }
        
        /**
         * Disable user activity
         * @param int $id
         * @param bool $value
         */
        public function prohibitUser($id, $value){
            
            $this->updateUserDat($id, ['deleted' => $value?1:0]);
        }      
        
        /**
         * Generate and set new check code. Send mail for user
         * @param \Nette\Security\IIdentity $user
         * @param string $mail
         * @return string
         */
        public function changeMailSet (\Nette\Security\IIdentity $user, $mail){

            $id = $user->getId();
            $name = Helper::combineUserName($user, false);
            $user->oldMail = $user->mail;
            $user->mail = $mail;
            
            $checkCode = $this->genCheckCode('checkCode', 6);
            
            $this->updateUserDat($id, ['checkCode' => $checkCode.'.newM', 'mail' => $mail]);
            
            (new SendMailManager())->sendNewMailCode($mail, $name, $checkCode);
            
            return $checkCode;
        }
        
        public function changeMailInProgress($id){
            
            $checkCode = $this->userDat()->where('id', $id)->fetch()->checkCode;
            return Nette\Utils\Strings::compare($checkCode, '.newM', -5)?true:false;
        }
        
        /**
         * Change mail is succesful
         * @param \Nette\Security\IIdentity $user
         * @param string $checkCode
         * @throws AuthenticationException
         */
        public function changeMailOk(\Nette\Security\IIdentity $user , $checkCode){
            
            $id = $user->id;                                    
                
            if($checkCode.'.newM' != $this->userDat()->where('id', $id)->fetch()->checkCode){
                    
                throw new AuthenticationException('Špatný ověřovací kód');
            }
            $user->oldMail = null;
                
            $this->updateUserDat($id, [
                'checkCode' => 'checked'
            ]);
            
        }
        
        /**
         * Change mail is not succesful
         * @param \Nette\Security\IIdentity $user
         */
        public function changeMailFail(\Nette\Security\IIdentity $user){
            
            $user->mail = $user->oldMail;
            $name = Helper::combineUserName($user, false);
            $checkCode = $this->genCheckCode('checkCode');
            
            (new SendMailManager())->sendNewMailCode($user->mail, $name, $checkCode, false);
            
            $this->updateUserDat($user->id, [
                'checkCode' => $checkCode,
                'mail' =>$user->oldMail
            ]);        
        }
        
        
        /**
         * Shortcut for database update user by id
         * @param int $id
         * @param array $data
         * @return Nette\Database\Context
         */
        private function updateUserDat($id, $data){
            
            return $this->userDat()->where('id', $id)->update($data);
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
