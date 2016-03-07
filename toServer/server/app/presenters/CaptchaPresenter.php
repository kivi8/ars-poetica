<?php

namespace App\Presenters;

use Nette,
    App\Model\CaptchaManager;

class CaptchaPresenter extends BasePresenter{
    
    /** @var CaptchaManager @inject */
    public $captchaManager;
    
    public function actionDefault(){
        
        $this->captchaManager->getCaptchaImage();
        $this->terminate();
    }
    
}
