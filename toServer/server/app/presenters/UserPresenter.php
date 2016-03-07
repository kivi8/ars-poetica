<?php

namespace App\Presenters;

use Nette,
        App\Model\UserManager;

class UserPresenter extends BasePresenter{
    
    /** @var UserManager @inject */
    public $userManager;
    
    public function actionDefault(){
        
        throw new \Nette\Application\BadRequestException;
    }
    
    public function actionDetail($id = ''){
        
        if(!$id){
            throw new \Nette\Application\BadRequestException;
        }
        
    }
    
    public function renderDetail($id){
        
        $this->template->userDat = $this->userManager->getUserData($id);
        
        if(!$this->template->userDat){
            
            throw new \Nette\Application\BadRequestException;
        }
    }
}
