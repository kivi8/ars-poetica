<?php

namespace App\Presenters;

use Nette,
	App\Model,
        Nette\Application\UI\Form;


/**
 * Log presenter.
 */
class LogPresenter extends BasePresenter{
    
    protected function createComponentLogInForm(){
        
        $form = new Form;
        
        $form->addText('nick', 'Jméno/mail')
                ->setRequired();
        
        $form->addPassword('password', 'Heslo')
                ->setRequired();
        
        $form->addCheckbox('remember', 'Zůstat přihlášený');
        
        $form->addSubmit('send', 'Odeslat');
        
        $form->onSuccess[] = [$this, logInFormSucceeded];
        
        return $form;
    }
    
}
