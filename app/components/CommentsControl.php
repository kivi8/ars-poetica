<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Components;

use Nette,
        Nette\Application\UI\Control,
        Nette\Security\User,
        Nette\Utils\Paginator,
        App\Model\CommentsManager,
        App\Authorization\ResourceAuthorizator,
        Nette\Application\UI\Form,
        Nette\Application\UI\Multiplier,
        App\Components\IRatingControlFactory,
        App\Model\CaptchaManager;


class CommentsControl extends Control{
    
    /** @var User */
    private $user;
    
    /** @var Paginator */
    private $paginator;
    
    /** @var CommentsManager */
    private $commentsManager;
    
    /** @var ResourceAuthorizator */
    private $resourceAuthorizator;
    
    /** @var CaptchaManager */
    private $captchaManager; 
    
    /**
    * @persistent
    * @var int
    */ 
    public $page; 
    
    /** @var int */
    public $lastPage; 
    
    /** @var IRatingControlFactory */
    private $rating;
    
    public function __construct(User $user, CommentsManager $commentsManager, ResourceAuthorizator $resourceAuthorizator, CaptchaManager $captchaManager, IRatingControlFactory $rating, $forWhat, $forId){
        
        $this->user = $user;       
        $this->paginator = new Paginator();
        $this->commentsManager = $commentsManager;
        $this->resourceAuthorizator = $resourceAuthorizator;
        $this->captchaManager = $captchaManager;      
        $this->rating = $rating;
        
        $this->commentsManager->setComments($forWhat, $forId, $this->user->isLoggedIn()?$this->user->id:null);
        
        $this->paginator->setItemCount($this->commentsManager->countComments());
        $this->paginator->setItemsPerPage(8);
        $this->paginator->setPage(1);
        
        $this->page = $this->paginator->getPage();
        $this->lastPage = $this->paginator->getLastPage();

    }    
    
    private function setPage($page = 1, $new = false){
        
        if($new){
            $this->paginator->itemCount++;
        }
        
        $this->paginator->setPage($page);
        $this->page = $page;
        $this->template->lastPage = $this->lastPage;
        $this->template->comments = $this->commentsManager->getComments($this->paginator);
    }
    
    public function render(){
        
        $this->template->setFile(__DIR__.'/templates/Comments/comments.latte');
        
        $this->template->_form = $this['addComment'];
        
        $this->setPage($this->page);     
        
        $this->template->render();
    }
    
    protected function createComponentAddComment(){
        
            $form = new Form;
            
            $form->getElementPrototype()->class('ajax');
        
            if(!$this->user->isLoggedIn()){
                $form->addText('unregname', 'Vaše jméno')
                    ->setRequired('Zadejte jméno');
                
                $captcha = $this->captchaManager->generateCaptcha();
                          
                $form->addText('captcha', $captcha['question'])
                    ->setAttribute('class', 'captchain')
                    ->setOption('description', $captcha['hint'])
                    ->setRequired('Musíte vyplnit správně kontrolní otázku')
                    ->setAttribute('');
            }
            
                       
            $form->addTextArea('text', 'Text')
                    ->setRequired('Zadejte text');                  
        
            $form->addSubmit('submit', 'Odeslat');
        
            $form->onSuccess[] = $this->formCommentSucceeded;
            return $form;                  
        
    }
    
    public function formCommentSucceeded(Form $form, $values){
        
        $sub= $form->getHttpData();    
        
        $under = isset($sub['subcomment']) && $sub['subcomment'] > 0 && $sub['subcomment'] !== '0'?$sub['subcomment']:false;
        
        
        if(!$this->user->isLoggedIn()){

            try{
                $this->captchaManager->checkCaptcha($values->captcha);
                $this->captchaManager->setNewQuestion();
            }
            catch(\Exception $e){
                
                if($under !== false){
                    $this->template->currentSubComment = $under;
                }
                
                $this->template->badAnswer = true;
                
                $this->flashMessage($e->getMessage().' Klikněte na: nová otázka');          
                $this->redrawAjax(['captchaContainer','captchaStatic', 'flashMessageComment']);
                return;
            }        
        }                       
            

            $this->commentsManager->addComment($values, $under);
            
            if($under === false){
                $this->setPage(1, true); 
                $this->flashMessage('Přidán komentář'); 
                $this->redrawAjax('commentContainerAll');
            }           
            else{
                $this->template->currentSubComment = $under;
                $this->flashMessage('Přidán podkomentář'); 
                $this->redrawAjax('commentContainerAll');                
            }
                        
            
            $this->redrawAjax(['captchaContainer','captchaStatic', 'flashMessageComment']);
                      
            
            $form->setValues([], true);
    }
    
        
    protected function createComponentRating() {
        
        return new Multiplier(function ($id){ 
            return $this->rating->create('comment', $id, RatingControl::MODE_PLUS);                  
        });                  
    }
    
    protected function createComponentRatingUnder() {
        
        return new Multiplier(function ($id){ 
            return $this->rating->create('commentUnder', $id, RatingControl::MODE_PLUS);                  
        });                  
    }    
    
    /**
     * Help with ajax components redrawing
     * @param array array $snippet
     * @param string $way
     */
    private function redrawAjax($snippet, $way = 'this'){
        
        if($this->presenter->isAjax()){
                
            foreach((array) $snippet as $snip){
                $this->redrawControl($snip);
            }
            
            
            $this->redrawControl('flashMessage');
            
        }
        else{
            $this->redirect($way);
        }
    }  
    
    public function handlePage($page){
        
        if(is_numeric($page) && $page <= $this->lastPage && $page>0){
            $this->setPage($page);
            
        }       
        else{
            $this->setPage(1);
        }
        $this->redrawAjax('commentContainerAll');
    }
    
    public function handleNewCaptcha($comID){
        
        $this->captchaManager->setNewQuestion();
        
        $this->template->currentSubComment = $comID;
        
        $this->redrawAjax(['captchaContainer','captchaStatic']);
    }
    
    protected function createComponentModerateCommentForm(){
        
        return new Multiplier( function ($idsub){
            
            $idsubArr = explode('q', $idsub);
            $id = (int) $idsubArr[0];
            $sub = $idsubArr[1] === 'false'?false:true;
            
            $form = new Form;
            $comment = $this->commentsManager->getSingleComment($id, $sub); 
            
            if(!((($comment->byUser && $comment->byUser === $this->user->getId()) || $this->user->isAllowed('Comments', 'moderate')) && $this->user->isLoggedIn())){
                return $form; 
            }
             
        
            $form->getElementPrototype()->class('ajax');
        
            if(!$comment->byUser){
                $form->addText('unregName', 'Neregistrované jméno')
                    ->setRequired('Zadejte jméno')
                    ->setValue($comment->unregName);
            }
         
            $form->addTextArea('text', 'Text')
                ->setRequired('Zadejte text')
                    ->setValue(preg_replace('$<p>\d{1,2}.\d{1,2}.\d{4} \d{1,2}:\d{1,2} provedena poslední změna</p>$', '', $comment->text));
        
            $form->addCheckbox('deleted', 'Smazaný')
                    ->setValue($comment->deleted);
            
            $form->addHidden('id', $id);
            $form->addHidden('sub', $sub?'true':'false');
        
            $form->addSubmit('moderate', 'Změnit');
        
            
            $form->onSuccess[] = [$this, 'moderateCommentFormSucceeded'];
        
            return $form;
        });
    }
    
    public function moderateCommentFormSucceeded(Form $form, $values){
        
        $sub= $form->getHttpData();
        
        try{
            $this->commentsManager->updateComment($values);
            $this->redrawAjax('commentContainerAll');
            
            if(isset($sub['subFor'])){
                $this->template->currentSubComment = $sub['subFor'];
            }
        
            $this->template->closeModal = true;
            
        }catch(App\Model\NoAccessException $e){
            
            $form->addError('Nemáte přístup');
        }
    }
    
    private function canUserChange($commetId, $sub = false){
        
        $under = $sub?'Under':'';
        
        return $this->resourceAuthorizator->canUse('Comments'.$under, $commetId);
    }
}

interface ICommentsControlFactory{
    
    /** @return CommentsControl */
    function create($forWhat, $forId);
    
}
