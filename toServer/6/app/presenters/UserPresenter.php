<?php

namespace App\Presenters;

use Nette,
        App\Model\UserManager,
        App\Model\ArticleManager;

class UserPresenter extends BasePresenter{
    
    /** @var UserManager @inject */
    public $userManager;
    
    /** @var ArticleManager @inject */
    public $articleManager;
    
    private $userDat;
    
    public function actionDefault(){
             
        throw new \Nette\Application\BadRequestException;
    }
    
    public function actionDetail($id = ''){
        
        if(!$id){
            throw new \Nette\Application\BadRequestException;
        }
        
        $this->userDat = $this->userManager->getUserData($id);
        
    }
      
    
    public function renderDetail(){
        
        $this->template->userDat = $this->userDat;
        
        $this->template->articles = $this->articleManager->getArticleByUser($this->userDat->id);
        
        if(!$this->template->userDat){
            
            throw new \Nette\Application\BadRequestException;
        }
    }
    
    /** @var \App\Components\ICommentsControlFactory @inject */
    public $comments;
    
    public function createComponentComments(){
           
        return $this->comments->create('user', $this->userDat->id);    
    }
}
