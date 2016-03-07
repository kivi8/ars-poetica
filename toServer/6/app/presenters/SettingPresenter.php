<?php

namespace App\Presenters;

use Nette,
        App\Model\UserManager,
        App\Forms\SettingFormFactory,
        Nette\Application\UI\Form,
        App\Forms\ChangePasswordForm;


/**
 * Setting presenter.
 */
class SettingPresenter extends BasePresenter{
    
    /** @var SettingFormFactory @inject */
    public $settingForm;
    
    /** @var UserManager @inject */
    public $userManager;
    
    protected function startup() {
        
        parent::startup();
        
        $this->notLoggedUser();
    }
        
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
    
    public function actionChangeMail(){
        
        
        if($this->userManager->changeMailInProgress($this->user->id)){
            $this->template->enterCode = true;
        }
        else{
            $this->template->enterCode = false;
        }
    }
    
    protected function createComponentChangeMail(){       
        
        $form = new Form;
        
        $form->addText('mail', 'Mail:')
                ->setRequired('Zadejte svůj nový mail')
                ->addRule(Form::EMAIL, 'Nesprávný formát mailu')
                ->setType('email');
        
        $form->addSubmit('submit','Odeslat potvrzovací kód na mail');
        
        $form->onSuccess[] = [$this, 'changeMailSucceeded'];            
        
        return $form;
    }
    
    public function changeMailSucceeded(Form $form, $values){
        
        $mail = $values->mail;
        
        if($this->userManager->checkName($mail, 'mail') != 0){
            
            $form->addError('Již použitý mail');
        }else{
            
            $this->userManager->changeMailSet($this->user->getIdentity(), $mail);
            $this->redirect('this');
        }
    }
    
    protected function createComponentEnterCode(){
        
        $form = new Form;
        
        $form->addText('mail', 'Mail:')
                ->setDisabled(true)
                ->setValue($this->user->getIdentity()->mail);
        
        $form->addText('checkCode', 'Kontrolní kód z mailu');
        
        $form->addSubmit('check', 'Zkontrolovat potvrzovací kód');
        
        $form->addSubmit('cancl', 'Začít znova');
        
        $form->onSuccess[] = [$this, 'enterCodeSucceeded'];            
        
        return $form;
    }
    
    public function enterCodeSucceeded(Form $form, $values){
        
        if($form['check']->isSubmittedBy()){
            $code = $values->checkCode;
        
            try{
                $this->userManager->changeMailOk($this->user->getIdentity(), $code);
                $this->goHome('Mail úspěšně změnen', 'Setting:');
            }
            catch(\Exception $e){
                $form->addError($e->getMessage());
            }
            
        }
        else{
            $this->userManager->changeMailFail($this->user->getIdentity());
            $this->goHome('Zkontrolujete si mail '.$this->user->getIdentity()->mail.' a znovu ho ověřte.');
        }
    }
    
    public function createComponentChangePassword(){
        
        $form = (new ChangePasswordForm())->create($this->userManager, $this->user->id);
        
        $form->onSuccess[] = (function () {
            $this->flashMessage('Heslo změněno', 'success');
            $this->redirect('this');
        });
        
        
        return $form;
        
    }
}
