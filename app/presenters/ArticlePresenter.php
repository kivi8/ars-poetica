<?php

namespace App\Presenters;

use Nette,
        App\Model\ArticleManager,
	App\Model\TextManager,
        Nette\Utils\Paginator;


/**
 * Article presenter.
 */
class ArticlePresenter extends BasePresenter{
     
    /** @var ArticleManager @inject */
    public $articleManager;
    
    /** @var TextManager @inject */
    public $textManager;
    
    
    /**
    * @persistent
    * @var int
    */ 
    public $stranka;
    
    /** @var Paginator */
    public $paginator;
    
    
    public function actionDefault($section, $subsection){
  
        if(!$this->session->started){
            $this->session->start();
        }
        $this->template->editorial = $this->textManager->getText(TextManager::EDITORIAL);
        $get = $this->getRequest()->parameters;
            
        if(isset($get['log']) && $get['log'] == 'in' && !$this->session->started){
                
            $this->template->customFlashMessage = 'Nemáte zapnuté soubory cookies, pro přihlášení musí být povoleny.';
        }
        
        if(!$subsection && !$section){
            
            $this->paginator = new Paginator;
            $this->paginator->setItemCount($this->articleManager->countNewArticleList());
            $this->paginator->setItemsPerPage(8);
            
            
            $this->template->articles = $this->articleManager->getNewArticleList($this->paginator);
            return;
        }
        
        $this->template->setFile(__DIR__.'/templates/Article/section.latte');
        
        if($section && !$subsection){
            
            $sectionDat = $this->articleManager->getSectionByUrl($section);
            
            if(!$sectionDat){
                throw new Nette\Application\BadRequestException;
            }
       
            $this->template->section = $sectionDat;
            $this->template->subSections = $this->articleManager->getSubSectionFor($sectionDat->id);
            $this->template->articles = $this->articleManager->getArticleNotSubsection($sectionDat);
	    $this->template->serials = $this->articleManager->getSerialForSection($sectionDat->id);
        }
        
        if($subsection){
            
            $subSectionDat = $this->articleManager->getSectionByUrl($subsection, 'subSectionDat');
	    
            if(!$subSectionDat){
                throw new Nette\Application\BadRequestException;
            }
	    
            $this->template->section = $subSectionDat;
            $this->template->subSections = null;
            $this->template->articles = $this->articleManager->getArticleBySubSection($subSectionDat);
	    $this->template->serials = $this->articleManager->getSerialForSubSection($subSectionDat->id);
        }
		      
    }   
    
    public function handlePage($stranka = ''){
        
        if(!$stranka || !is_numeric($stranka)){
            throw new \Nette\Application\BadRequestException;
        }
        
        $this->paginator->setPage($stranka);
        $this->stranka = $stranka;
        $this->template->articles = $this->articleManager->getNewArticleList($this->paginator);
    }
    
    private $articleDat;
    
    public function actionArticle($url = ''){
        
        if(!$url){
            throw new Nette\Application\BadRequestException;
        }
        
        $this->articleDat = $this->articleManager->getArticleUrl($url);
        
        if(!$this->articleDat || $this->articleDat->deleted == 1){
            throw new Nette\Application\BadRequestException;
        }
    }
    
    public function renderArticle($url){
 
        if(!\App\Helper\Helper::isIndexBot()){
            $this->articleManager->viewForArticleUrl($url, $this->getSession());
        }
        
        $this->template->serial = $this->articleDat->ref('underSerial');
        
	if($this->template->serial){
	    $this->template->articleInSerial = $this->articleManager->getArticlesUnderSerial($this->template->serial->articleOrder);
	}
	
        $this->template->article = $this->articleDat;
    }
    
    /** @var \App\Components\IRatingControlFactory @inject */
    public $rating;
        
    public function createComponentRating() {
        
        return $this->rating->create('article', $this->articleDat->id);       
    }
    
    /** @var \App\Components\ICommentsControlFactory @inject */
    public $comments;
    
    public function createComponentComments(){
           
        return $this->comments->create('article', $this->articleDat->id);    
    }
    
}
