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
    
    public function actionArticle($url = ''){
        
        if(!$url){
            throw new Nette\Application\BadRequestException;
        }
    }
    
    public function renderArticle($url){
        
        $this->template->article = $this->articleManager->getArticleUrl($url);
    }
    
}
