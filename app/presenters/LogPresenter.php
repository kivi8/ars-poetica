<?php

namespace App\Presenters;

use Nette,
        App\Forms\LogFormFactory;


/**
 * Log presenter.
 */
class LogPresenter extends BasePresenter{
    
    /**
     * Login form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentLogForm(){
        
        $form = (new LogFormFactory($this->user))->create();
        
        $form->onSuccess[] = (function (){
            $this->goHome('Uživatel ' .$this->user->getIdentity()->name. ' byl přihlášen');
        });
        
        
        return $form;
    }
    
    
    
}
