<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form,
        App\Model\UserManager,
        App\Model\SendMailManager;

class LostPassForm {
    
    /** @var UserManager */
    private $userManager;    
    
    public function __construct(UserManager $userManager) {
        
        $this->userManager = $userManager;
    }
    
    /**
     * Lost password form
     * @return Form
     */
    public function create(){
        
        $form = new Form;
        
        $form->addText('mail', 'Zadejte svůj registrovaný mail')
                ->setRequired('Zadejte svůj mail')
                ->addRule(Form::EMAIL, 'Nesprávný formát mailu')
                ->setType('email');  
        
        $form->addSubmit('renew', 'Obnovit');
        
        $form->onSuccess[] = [$this, 'succeeded'];
        
        return $form;        
    }
    
    /**
     * Form sent
     */
    public function succeeded($form, $values){
        
        try {
            
            $this->userManager->lostPassword($values->mail);
                                               
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }
}
