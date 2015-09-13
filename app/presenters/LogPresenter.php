<?php

namespace App\Presenters;

use Nette,
        App\Forms\LogFormFactory,
        App\Forms\RegisterFormFactory,
        App\Forms\NewPassForm,
        App\Forms\LostPassForm,
        App\Helper\Helper,
        Nette\Utils\Html;


/**
 * Log presenter.
 */
class LogPresenter extends BasePresenter{
    
    /** @var \App\Model\UserManager @inject */ 
    public $userManager;
    
    /**
     * Log in
     */
    public function actionIn(){
        
        $this->isLoggedUser();
    }


    /**
     * Login form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentLogForm(){
        
        $form = (new LogFormFactory($this->user))->create();
        
        $form->onSuccess[] = [$this, 'userLoginSucceeded'];
        
        
        return $form;
    }
    
    /**
     * After user login
     */
    public function userLoginSucceeded(){
        
        $userDat = $this->user->getIdentity()->data;
            
            if($userDat['checkCode'] !== 'checked'){
                
                $el = Html::el('span', 'Prosím zkontrolujte svůj mail a ověřte ho. Pokud vám nepřišla ověřovací zpráva, změňte mail v ');                
                $settingA = Html::el('a', 'nastavení')->href($this->link('Setting:default'));
                $el->add($settingA);
                
                $this->flashMessage($el);
            }
            
            $this->goHome(Helper::combineUserName($userDat). ' byl přihlášen');
    }
    
    /** @var RegisterFormFactory @inject */
    public $registerFormFactory;
    
    /**
     * Register
     */
    public function actionRegister(){
        
        $this->isLoggedUser();
    }
    
    /**
     * Registration form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentRegisterForm(){

        $form = $this->registerFormFactory->create();
        
        $form->onSuccess[] = (function (){
            $this->goHome('Registrace byla úspěšná, vyčkejte na ověřovací mail. Můžete se nyní přihlásit.', 'Log:in');
        });
        
        
        return $form;
    }
    
    /**
     * Confim users mail and redirect
     * @param string $id
     */
    public function actionConfimNewUser($id){
        
        if(empty($id)){
            $this->goHome();
        }
        
        $this->isLoggedLogoutUser();       
        
        if($this->userManager->confimNewUser($id)){
            $this->goHome('Uživatel úspěšně ověřen, prosím přihlašte se.','Log:in');
        }
        else{
            $this->goHome('Takový uživatel neexistuje, nebo propadl ověřovací kód.');
        }             
    } 
    
    /**
     * Lost password
     */
    public function actionLostPass(){
        
        $this->isLoggedUser();
    }
    
    /** @var LostPassForm @inject */
    public $lostPassForm;
    
    /**
     * Lost password form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentLostPassForm(){
        
        $form = $this->lostPassForm->create();
        
        $form->onSuccess[] = (function (){
            $this->goHome('Byl vám odeslán mail. Prosím klikněte na odkaz a zadejte nové heslo, staré je stále funkční.');
        });
        
        return $form;
    }
    
    /** @var NewPassForm @inject */
    public $newPassForm;
    
    /**
     * New password form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentNewPassForm(){
        
        $form = $this->newPassForm->create();
        
        $form->onSuccess[] = (function (){
            $this->goHome('Obnova hesla byla úspěšná, můžete se přihlásit.', 'Log:in');
        });
        
        return $form;
    }
    
    public function actionNewPass($id){
        
        if(empty($id)){
            $this->goHome();
        }
        
        $this->isLoggedLogoutUser();
        
        $name = $this->userManager->newPasswordCheck($id);
        
        if(!$name){
            $this->goHome('Tento odkaz je starý, prosím požádejte o heslo znovu.', 'Log:lostPass');
        }
        
        $this->template->name = $name;
    }

    

    /**
     * Logout user
     */
    public function actionOut(){
        
        $this->notLoggedUser();
        $this->user->logout();
        $this->goHome(Helper::combineUserName($this->user->getIdentity()->data). ' úspěšně odhlášen');
    }
}
