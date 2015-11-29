<?php

namespace App\Components;

use Nette,
        Nette\Application\UI\Control,
        Nette\Security\User,
        App\Model\NewsManager,
        App\Authorization\ResourceAuthorizator,
        App\Forms\FastNewsAddForm;

class NewsControl extends Control{
    
    private $authorizator;    
    private $newsManager;
    private $user;
    
    const RES = 'FastNews';
    
    public function __construct(NewsManager $newsManager, User $user, ResourceAuthorizator $authorizator) {
        
        $this->newsManager = $newsManager;
        $this->user = $user;
        $this->authorizator = $authorizator;
    }
    
    public function render(){
    
        $template = $this->template;
        $template->setFile(__DIR__.'/templates/News/news.latte');
        
        if(empty($this->template->news)){
            $template->news = $this->newsManager->getNewsList(5); 
        }
        
        $this->template->authorizator = $this->authorizator;
        
        $template->render();
    }    
    
    public function handleAddNews(){
        
        if(!$this->user->isAllowed(self::RES, 'add')){
            
            $this->presenter->redirect('Homepage:');            
        }
        
        $this->template->addNews = true;
        $this->redirectAjax();
    }
    
    public function handleNoAdd(){
        
        unset($this->template->addNews);
        $this->redirectAjax();
    }
    
    private function redirectAjax(){
        
        if($this->presenter->isAjax()){
            $this->redrawControl('news');
        }
        else{
            $this->redirect('this');
        }
    }
    
    public function handlePermalink($url = ''){
        
        if(!$url){
            throw new \Nette\Application\BadRequestException;
        }
        
        $this->template->news = $this->newsManager->getOneNews($url);
        
        if(!$this->template->news){
            throw new \Nette\Application\BadRequestException;
        }
        
        $this->template->permalink = true;
    }
    
    public function handleAllNews(){
        
        $this->redirectAjax();
    }    
    
    public function createComponentAddForm() {
        
        if(!$this->user->isAllowed(self::RES, 'add')){
            
            throw new \Nette\Security\AuthenticationException;            
        }
        
        $form = (new FastNewsAddForm())->create();
        $form->getElementPrototype()->class[] = "ajax";
                
        $form->onSuccess[] = [$this, 'addFormSucceeded'];
        
        return $form;
    }
    
    public function addFormSucceeded($form, $values){
        
        $this->newsManager->addNews($values, $this->user->id);           
        
        if(isset($this->template->addNews)){
            unset($this->template->addNews);
        }
        $this->redirectAjax();
    }
}
