<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    
    /**
     * Main search form on every page
     * @return Form
     */
    
    protected function createComponentSearchForm(){
        
        $form = new Form;
        
        $form->addText('search', '')
            ->setAttribute('placeholder', 'Vyhledávání');
        
        $form->addSubmit('find', ' ');
        
        $form->onSuccess[] = [$this, 'searchFormSucceeded'];
        return $form;
    }
    
    public function searchFormSucceeded(Form $form, $values){
        
        $this->redirect('Search:'.$values->search);
    }
    
    /**
     * Used to go home
     * @param string $message
     */
    protected function goHome($message = null, $way='Homepage:default'){
        
        if($message){
            $this->flashMessage($message);
        }
        
        $this->redirect($way);
    }
    
    /**
     * If user is not logged in go to login page
     */
    protected function notLoggedUser(){
        
        if(!$this->user->isLoggedIn()){
            
            $this->goHome('Nejste přihlášen', 'Log:in');
        }
    }
    
    /**
     * If user is logged in go to homepage
     */
    protected function isLoggedUser(){
        
        if($this->user->isLoggedIn()){
            
            $this->goHome('Nemůžete pokud jste přihlášen, odhlašte se', 'Homepage:');
        }
    }
    
    /**
     * If user is logged in logout
     */
    protected function isLoggedLogoutUser(){
        
        if($this->user->isLoggedIn()){
            
            $this->user->logout();
        }
    }
    
}
