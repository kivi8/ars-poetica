<?php

namespace App\Presenters;

use Nette,
        App\Model\UserManager,
        App\Forms\SettingFormFactory;


/**
 * Setting presenter.
 */
class SettingPresenter extends BasePresenter{
    
    /** @var SettingFormFactory @inject */
    public $settingForm;
    
    protected function startup() {
        
        parent::startup();
        
        $this->notLoggedUser();
    }
    
    public function renderDefault(){
        
        $this->template->path = pathinfo($this->getUser()->getIdentity()->photo);        
    }
    
    /** @var UserManager @inject */
    public $userManager;
    
    public function handleDelFoto(){
        
        $user = $this->user->getIdentity();
        
        if($user->photo){       
            
            $this->userManager->delPhoto($user);
           
            $this->goHome('Data úspěšně změněna', 'Setting:');
        }
    }
    
    protected function createComponentUpdateUserFrom() {
        
        $form = $this->settingForm->create();
        
        $form->onSuccess[] = (function (){
            
            $this->goHome('Data úspěšně změněna', 'this');
        });
        
        return $form;
    }
}
