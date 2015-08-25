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
    protected function goHome($message = null){
        
        if($message){
            $this->flashMessage($message);
        }
        
        $this->redirect('Homepage:default');
    }
    
}
