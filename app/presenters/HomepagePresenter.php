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
    
    public function actionKontakt() {

        $this->template->_form = $this['newWriterForm'];
    }
    
    public function renderCreativeCommons(){
	$this->template->text = $this->textManager->getText(TextManager::CREATIVE_COMMONS);
    }
    
    public function renderKontakt(){
	$this->template->text = $this->textManager->getText(TextManager::KONTAKT);
	
    }
    
    public function renderONas(){
	$this->template->text = $this->textManager->getText(TextManager::O_NAS);
    }

    public function renderRedakce(){
	$this->template->text = $this->textManager->getText(TextManager::REDAKCE);
    }

    public function actionDefault(){

        $this->redirect('Article:default');
    }
    
    public function createComponentNewWriterForm() {
        return (new SendArticle)->create($this->articleManager, $this->captchaManager, $this);
    }
      
}
