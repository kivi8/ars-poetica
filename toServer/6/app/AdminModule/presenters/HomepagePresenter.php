<?php

namespace App\AdminModule\Presenters;

use Nette,
    App\Model\ArticleManager;

class HomepagePresenter extends BasePresenter{
    
    /** @var ArticleManager @inject */
    public $articleManager; 
    
    
    public function renderDefault(){
        
        $this->template->newWriters = $this->articleManager->getNewWriters();
    }
    
    public function handleDelNewWriter($id = ''){
        
        if(!$this->user->isAllowed('Article', 'moderate') || !is_numeric($id)){
            throw new Nette\Application\BadRequestException;
        }
        
        $this->articleManager->delNewWriter($id);
        $this->redrawAjax('newWriters');
    }
    
    public function handlePublishNewWriter($id = ''){
        
        if(!$this->user->isAllowed('Article', 'add') || !is_numeric($id)){
            throw new Nette\Application\BadRequestException;
        }
        
        $returnId = $this->articleManager->publicNewWriter($id);
        $this->flashMessage('Článek úspěšně přidán');
        $this->redirect('Article:UpdateArticle', $returnId);
    }
}
