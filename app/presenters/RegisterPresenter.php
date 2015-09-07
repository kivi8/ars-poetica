<?php

namespace App\Presenters;

use Nette,
    App\Forms\RegisterFormFactory;


/**
 * Register presenter.
 */
class RegisterPresenter extends BasePresenter{
    
    protected function createComponentRegisterForm(){
        
        $form = (new RegisterFormFactory($this->user))->create();
        
        $form->onSuccess[] = (function (){
            $this->goHome('Uživatel ' .$this->user->getIdentity()->name. ' byl přihlášen');
        });
        
        
        return $form;
    }
}
