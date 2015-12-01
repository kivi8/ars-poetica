<?php

namespace App\Presenters;

use Nette,
        Nette\Application\UI\Form,
        App\Model\ArticleManager;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    /** @var ArticleManager @inject */
    public $articleManager;
    
    protected function beforeRender() {
        parent::beforeRender();
        $this->template->menu = $this->articleManager->getSectionList();
    }


    /**
     * Main search form on every page
     * @return Form
     */   
    protected function createComponentSearchForm(){
        
        $form = new Form;
        
        $form->addText('search', '')
            ->setAttribute('placeholder', 'Vyhledávání');
        
        $form->addSubmit('find', '');
        
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
    protected function goHome($message = null, $way='Homepage:default', $destination = [], $messageType = 'info'){
        
        if($message){
            $this->flashMessage($message, $messageType);
        }
        
        $this->redirect($way, $destination);
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
    
    /**
     * Help with ajax components redrawing
     * @param string array $snippet
     * @param string $way
     */
    protected function redrawAjax($snippet, $way = 'this'){
        
        if($this->isAjax()){
            
            if(is_array($snippet)){
                
                foreach($snippet as $snip){
                    $this->redrawControl($snip);
                }
            }
            else{
                $this->redrawControl($snippet);               
            }
            
            $this->redrawControl('flashMessage');
        }
        else{
            $this->redirect($way);
        }
    }    
    
    /** @inject @var \App\Model\NewsManager */
    public $newsManager;
    
    /** @inject @var \App\Authorization\ResourceAuthorizator */
    public $resourceAuthorizator;
    
    /**
     * Fast news box on right side
     */
    public function createComponentNews(){
        
        return new \App\Components\NewsControl($this->newsManager, $this->user, $this->resourceAuthorizator);
    }
    
}
