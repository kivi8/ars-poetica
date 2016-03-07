<?php

namespace App\Presenters;

use Nette,
        App\Model\ArticleManager,
        App\Model\CaptchaManager,
        App\Forms\SendArticle;


/**
 * SendArticle presenter.
 */
class SendArticlePresenter extends BasePresenter{
    
    /** @var ArticleManager @inject */
    public $articleManager;
    
    /** @var CaptchaManager @inject*/
    public $captchaManager;   
    
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
