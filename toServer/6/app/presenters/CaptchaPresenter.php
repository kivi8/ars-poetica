<?php

namespace App\Presenters;

use Nette,
    App\Model\CaptchaManager;

class CaptchaPresenter extends BasePresenter{
    
    /** @var CaptchaManager @inject */
    public $captchaManager;
    
    public function actionDefault($t = '', $color = '', $size = ''){
        
        $this->captchaManager->getCaptchaImage($color, $size);
        $this->terminate();
    }   
    
}
