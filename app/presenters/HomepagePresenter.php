<?php

namespace App\Presenters;

use Nette,
        App\Model\ArticleManager,
        App\Model\CaptchaManager,
        App\Forms\SendArticle;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{   
    
    /** @var ArticleManager @inject */
    public $articleManager;
    
    /** @var CaptchaManager @inject*/
    public $captchaManager;  
    
    
    public function actionDefault(){
         
        $this->redirect('Article:default');
    }
    
    public function createComponentNewWriterForm() {
        return (new SendArticle)->create($this->articleManager, $this->captchaManager, $this);
    }
    
    /**
     * New captcha picture
     */
    public function handleNewCaptcha(){
        
        $this->captchaManager->setNewQuestion();
        
        $this->redrawAjax('captcha');
    }
}
