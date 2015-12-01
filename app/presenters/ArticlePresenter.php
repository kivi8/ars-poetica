<?php

namespace App\Presenters;

use Nette,
        App\Model\ArticleManager;


/**
 * Article presenter.
 */
class ArticlePresenter extends BasePresenter{
     
    /** @var ArticleManager @inject */
    public $articleManager;
    
    public function actionDefault($section, $subsection){
  
        $get = $this->getRequest()->parameters;
            
        if(isset($get['log']) && $get['log'] == 'in' && !$this->session->started){
                
            $this->template->customFlashMessage = 'Nemáte zapnuté soubory cookies, pro přihlášení musí být povoleny.';
        }
        
        if(!$subsection && !$section){
            
            $this->template->articles = $this->articleManager->getNewArticleList();
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
        }
        
        if($subsection){
            
            $subSectionDat = $this->articleManager->getSectionByUrl($subsection, 'subSectionDat');
            
            $this->template->section = $subSectionDat;
            $this->template->subSections = [];
            $this->template->articles = $this->articleManager->getArticleNotSubsection($subSectionDat);
        }
        
    }   
    
    public function actionArticle($url = ''){
        
        if(!$url){
            throw new Nette\Application\BadRequestException;
        }
    }
    
    public function renderArticle($url){
        
        $article = $this->articleManager->getArticleUrl($url);
        
        if(!$article){
            throw new Nette\Application\BadRequestException;
        }
        
        $this->template->article = $article;
    }
    
}
