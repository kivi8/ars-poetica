<?php

namespace App\Presenters;

use Nette,
        App\Model\ArticleManager,
        App\Model\CaptchaManager,
        Nette\Application\UI\Form;


/**
 * SendArticle presenter.
 */
class SendArticlePresenter extends BasePresenter{
    
    /** @var ArticleManager @inject */
    public $articleManager;
    
    /** @var CaptchaManager @inject*/
    public $captchaManager;
    
    public function actionDefault(){
        
        
    }
    
    public function createComponentNewWriterForm() {
        
        $form = new Form;
        
        $form->addText('title', 'Titulek');
        
        $form->addTextArea('aboutUser', 'Něco o vás');
        
        $form->addTextArea('text', 'Váš článek');
        
              
        if(!$this->user->isLoggedIn()){
            
            $form->addText('contact', 'Kontakt na vás (jakýkoliv)')
                ->setRequired('Musíte zadat kontakt');
            
            $captcha = $this->captchaManager->generateCaptcha();
                          
            $form->addText('captcha', $captcha['question'])
                    ->setOption('description', $captcha['hint'])
                    ->setRequired('Musíte vyplnit správně kontrolní otázku')
                    ->setAttribute('');
        }
        
        
        $form->addSubmit('submit', 'Odeslat');
        
        $form->onSuccess[] = [$this, 'newWriterFormSucceeded'];
        $form->onSuccess[] = (function(){
            $this->goHome('Váš článek byl odeslán redakci');
        });
        
        return $form;       
    }
    
    public function newWriterFormSucceeded($form, $values){
        
        if(!$this->user->isLoggedIn()){

            try{
                $this->captchaManager->checkCaptcha($values->captcha);
            }
            catch(\Exception $e){
                $this->goHome($e->getMessage(), 'this');
            }
            $values->byUser = null;          
        }
        else{
            $values->contact = $this->user->getIdentity()->mail;
            $values->byUser = $this->user->id;
        }
        
        
        try{                      
            $this->articleManager->addNewWriter($values);            
                        
        }catch(\Exception $e){
            
            $form->addError($e->getMessage());
        }     
               
    }
    
    /**
     * New captcha picture
     */
    public function handleNewCaptcha(){
        
        $this->captchaManager->setNewQuestion();
        
        $this->redrawAjax('captcha');
    }
}
