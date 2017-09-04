<?php

namespace App\Presenters;

use Nette,
        App\Model\ArticleManager,
        App\Model\CaptchaManager,
        App\Forms\SendArticle,
	App\Model\TextManager;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{   
    
    /** @var ArticleManager @inject */
    public $articleManager;
    
    /** @var CaptchaManager @inject*/
    public $captchaManager;  
    
    /** @var TextManager @inject */
    public $textManager;
    
    
    public function renderCreativeCommons(){
	$this->template->text = $this->textManager->getText(TextManager::CREATIVE_COMMONS);
    }
    
    public function renderSpolupracujeme(){
	$this->template->text = $this->textManager->getText(TextManager::SPOLUPRACUJEME);
	
    }
    
    public function renderONas(){
	$this->template->_form = $this['newWriterForm'];
	$this->template->text = $this->textManager->getText(TextManager::O_NAS);
    }

    public function actionDefault(){

        $this->redirect('Article:default');
    }
    
    public function createComponentNewWriterForm() {
        return (new SendArticle)->create($this->articleManager, $this->captchaManager, $this);
    }
      
}
