<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form,
        App\Model\UserManager;

class ChangePasswordForm {
    
    /** @var UserManager */
    private $userManager;

    /** @var int */
    private $userId;
    
    public function create(UserManager $userManager, $userId){
         
        $this->userId = $userId;
        $this->userManager = $userManager;
        
        $form = new Form;
       
        $form->addPassword('oldPassword', 'Staré heslo:')
                ->setType('password')
                ->setRequired('Zadejte své staré heslo');

        $form->addPassword('password', 'Nové heslo:')
                ->setType('password')
                ->setRequired('Zadejte své nové heslo')
                ->addRule(Form::PATTERN, 'Heslo musí obsahovat číslici', '.*[0-9].*')
                ->addRule(Form::PATTERN, 'Heslo musí obsahovat písmeno', '.*[a-z].*')
                ->addRule(Form::MIN_LENGTH, 'Heslo musí být dlouhé min 6 znaků', 6);
        
        $form->addPassword('passwordVerify', 'Heslo pro kontrolu:')
            ->setRequired('Zadejte prosím heslo ještě jednou pro kontrolu')
            ->addRule(Form::EQUAL, 'Hesla se neshodují', $form['password']);
                
        $form->addSubmit('passwordChange', 'Změnit heslo');
                
        $form->onSuccess[] = [$this, 'succeeded'];                     
        
        return $form;
        
    }
    
    public function succeeded(Form $form, $values){
        
        try{
            $this->userManager->updatePassword($values, $this->userId);
            
        }
        catch (Nette\Security\AuthenticationException $e){
            $form->addError($e->getMessage());
        }
    }

    
}