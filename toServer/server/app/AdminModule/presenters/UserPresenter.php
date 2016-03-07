<?php

namespace App\AdminModule\Presenters;

use Nette,
        App\Model\UserManager,
        App\Forms\SettingFormFactory,
        Nette\Application\UI\Form;

class UserPresenter extends BasePresenter{
    
    /** @var UserManager @inject */
    public $userManager;
    
    private $userMod;
    
    const RES = 'User';
    
    public function actionDefault(){
               
        $moderate = $this->user->isAllowed(self::RES, 'moderate');
        $prohibit = $this->user->isAllowed(self::RES,'prohibit');
        $see = $this->user->isAllowed(self::RES,'see'); 
        
        if($moderate || $prohibit || $see){ 
            
                $this->template->userList = $this->userManager->getUserList();
                unset($this->template->userList[$this->user->getId()]);
        }     
    }
    
    public function actionModerate($id = ''){
        
        $moderate = $this->user->isAllowed(self::RES, 'moderate');
        
        if(empty($id)){
            
            throw new \Nette\Application\BadRequestException;
        }
        if(!$moderate){  
            
            $this->goHome();
        }
        
            $user = $this->userManager->getUserData($id);
            
            if(!$user){
                $this->goHome('Neexistující uživatel');
            }
            
            $this->userMod = $user;
            $this->template->combinatedName = \App\Helper\Helper::combineUserName($user);
        
    }
    
    public function handleProhibitUser($user = '', $value = true){
        
        if(!$this->user->isAllowed(self::RES,'prohibit') || empty($user) || !is_numeric($user)){
            $this->goHome();
        }
        
        $this->userManager->prohibitUser($user, $value);
        
        $this->template->userList = $this->userManager->getUserList();
        unset($this->template->userList[$this->user->getId()]);
        
        $this->redrawAjax('users');
    }
    
    /**
     * Registration form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentAddUserForm(){

        if(!$this->user->isAllowed(self::RES,'add')){
            $this->goHome();
        }
        
        $form = new Form;                		
                
        $form->addText('mail', 'Mail:')
                ->setRequired('Zadejte mail')
                ->addRule(Form::EMAIL, 'Nesprávný formát mailu')
                ->setType('email');

        $form->addText('password', 'Nové heslo:')
                ->setType('password')
                ->setRequired('Zadejte své nové heslo')
                ->addRule(Form::PATTERN, 'Heslo musí obsahovat číslici', '.*[0-9].*')
                ->addRule(Form::PATTERN, 'Heslo musí obsahovat písmeno', '.*[a-z].*')
                ->addRule(Form::MIN_LENGTH, 'Heslo musí být dlouhé min 6 znaků', 6);
                
        $form->addSubmit('submit', 'Registrovat nového uživatele');
                
        $form->onSuccess[] = [$this, 'registerFormSucceeded'];
               
        
        
        return $form;
    }
    
    public function registerFormSucceeded($form, $values){      
            
        try{           
            $this->userManager->registerNew($values->mail, $values->password, $values->nickName);
                        
        }catch(\Exception $e){
            
            $form->addError($e->getMessage());
        }
        
        $this->goHome('Registrace byla úspěšná, vyčkejte na ověřovací mail. Sdělte heslo majiteli', 'this');
        
    }
    
    /** @var SettingFormFactory @inject */
    public $settingForm;
    
    public function createComponentModerateUserForm(){
        
        if(!$this->user->isAllowed(self::RES, 'moderate')){
            $this->goHome();
        }
        
        $form = $this->settingForm->create($this->userMod, true);
        
        $form->onSuccess[] = (function (){
            
            $this->goHome('Data úspěšně změněna', 'this');
        });
               
        return $form;
    }
}
