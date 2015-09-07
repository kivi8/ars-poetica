<?php

namespace App\Model;

use Nette,
        Nette\Utils\Random,
	Nette\Security\Passwords;


/**
 * Users management.
 */
class UserManager extends Manager implements Nette\Security\IAuthenticator
{

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
		return new Nette\Security\Identity($row['id'], $row[self::COLUMN_ROLE], $arr);
	}


	/**
	 * Adds new user.
	 * @param  string
         * @param  string
	 * @param  string
	 * @return void
	 */
        public function registerNew($mail, $password, $nickName = ''){
            if($this->checkName($name)){
                throw new \Exception('Obsazené jméno');
            }
                           
            $this->acceessPermanent()->insert(array(
                'password' => Passwords::hash($password),
                'nickName' => $nickName,               
                'mail' => $mail,
                'registerTime' => date('Y-m-d H:i:s'),
                'checkCode' => $this->genCheckCode(),
                'wall' => 0,
                'permissions' => '000000000000',
                'deleted' => 0,
            ));
            
        }
        /*
         * Check availability of user name
         */
        private function checkName($name){
            return $this->acceessPermanent()
                    ->where('name', $name)->fetch();           
        }
        
        private function genCheckCode(){
            
            $random = Random::generate(15, '0-9a-z');
            
            if($this->userDat()->where('checkCode')->count() == 0){
                return $random;
            }
            
            return $this->genCheckCode();
        }
        
        private function userDat(){
            return $this->database->table('user');
        }

}



class DuplicateNameException extends \Exception
{}
