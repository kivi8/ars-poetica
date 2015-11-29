<?php

namespace App\AdminModule\Presenters;

use Nette;

abstract class BasePresenter extends \App\Presenters\BasePresenter{
    
    public function startup() {
        parent::startup();
        
        if(!$this->user->isAllowed('Admin','can')){
            throw new \Nette\Application\ForbiddenRequestException;
        }
    }
}
