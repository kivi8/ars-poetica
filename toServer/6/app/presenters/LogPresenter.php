<?php

namespace App\Presenters;

use Nette,
        App\Forms\LogFormFactory,
        App\Forms\NewPassForm,
        App\Forms\LostPassForm,
        App\Helper\Helper,
        Nette\Utils\Html,
        Nette\Application\UI\Form,
        App\Model\CaptchaManager;


/**
 * Log presenter.
 */
class LogPresenter extends BasePresenter{
    
    /** @var \App\Model\UserManager @inject */ 
    public $userManager;
    
    /** @var CaptchaManager @inject */ 
    public $captchaManager;
    
    
    /** @var string */
    private $requestKey;
    /**
     * Go home if empty
     */
    public function actionDefault(){
        
        $this->redirect('Homepage:');
    }

    /**
     * Log in
     */
    public function actionIn($request = ''){

        $this->isLoggedUser();
        
        if($request){
            $this->requestKey = $request;
        }        
    }

    /** @var LogFormFactory @inject */
    public $logFormFactory;

    /**
     * Login form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentLogForm(){
        
        $form = $this->logFormFactory->create();
        
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
                     
            $this->goHome(Helper::combineUserName($userDat). ' byl přihlášen', 'Homepage:', ['log'=>'in'], 'success', $this->requestKey);
    }    
    
    /**
     * Register
     */
    public function actionRegister(){
        
        $this->isLoggedUser();
        $this->template->_form = $this['registerForm'];
    }
    
    /**
     * Registration form
     * @return Nette\Application\UI\Form
     */
    protected function createComponentRegisterForm(){

        $form = new Form;                		
                
        $form->addText('mail', 'Mail:')
                ->setRequired('Zadejte svůj mail')
                ->addRule(Form::EMAIL, 'Nesprávný formát mailu')
                ->setType('email');

        $form->addPassword('password', 'Nové heslo:')
                ->setType('password')
                ->setRequired('Zadejte své nové heslo')
                ->addRule(Form::PATTERN, 'Heslo musí obsahovat číslici', '.*[0-9].*')
                ->addRule(Form::PATTERN, 'Heslo musí obsahovat písmeno', '.*[a-z].*')
                ->addRule(Form::MIN_LENGTH, 'Heslo musí být dlouhé min 6 znaků', 6);
        
        $form->addPassword('passwordVerify', 'Heslo pro kontrolu:')
            ->setRequired('Zadejte prosím heslo ještě jednou pro kontrolu')
            ->addRule(Form::EQUAL, 'Hesla se neshodují', $form['password']);
                                               
        $form->addText('nickName', 'Jméno:')                       
                ->addCondition(Form::FILLED)
                ->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 3);
                
                
        $captcha = $this->captchaManager->generateCaptcha();
                          
        $form->addText('captcha', $captcha['question'])
            ->setOption('description', $captcha['hint'])
            ->setRequired('Musíte vyplnit správně kontrolní otázku')
            ->setAttribute('');
                
        $form->addSubmit('submit', 'Registrovat');
                
        $form->onSuccess[] = [$this, 'registerFormSucceeded'];
               
        
        
        return $form;
    }
    
    /**
     * Form OK
     * @param Form $form
     * @param type $values
     */
    public function registerFormSucceeded(Form $form, $values){
            
        try{
            $this->captchaManager->checkCaptcha($values->captcha);
        }
        catch(\Exception $e){
            $this->goHome($e->getMessage(), 'this');
        }          
            
        try{           
            $this->userManager->registerNew($values->mail, $values->password, $values->nickName);
                        
        }catch(\Exception $e){
            
            $form->addError($e->getMessage());
        }
        
        if($form->success){
            $this->goHome('Registrace byla úspěšná, vyčkejte na ověřovací mail. Můžete se nyní přihlásit.', 'Log:in', [], 'success');
        }
        
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
            $this->goHome('Uživatel úspěšně ověřen, prosím přihlašte se.','Log:in', [], 'success');
        }
        else{
            $this->goHome('Takový uživatel neexistuje, nebo propadl ověřovací kód.', 'Homepage:default', [], 'danger');
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
            $this->goHome('Obnova hesla byla úspěšná, můžete se přihlásit.', 'Log:in', [], 'success');
        });
        
        return $form;
    }
    
    /**
     * First step to make new password
     * @param type $id
     */
    public function actionNewPass($id){
        
        if(empty($id)){
            $this->goHome();
        }
        
        $this->isLoggedLogoutUser();
        
        $name = $this->userManager->newPasswordCheck($id);
        
        if(!$name){
            $this->goHome('Tento odkaz je starý, prosím požádejte o heslo znovu.', 'Log:lostPass', [], 'waring');
        }
        
        $this->template->name = $name;
    }

    

    /**
     * Logout user
     */
    public function actionOut($request = ''){
        
        $this->notLoggedUser();
        $this->user->logout();
        $this->goHome(Helper::combineUserName($this->user->getIdentity()->data). ' úspěšně odhlášen', 'Homepage:default', [], 'success', $request?$request:false);
    }
    
}
