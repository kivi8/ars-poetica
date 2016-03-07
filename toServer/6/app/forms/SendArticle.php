<?php

namespace App\Forms;

use Nette,
        App\Model\ArticleManager,
        App\Model\CaptchaManager,
        Nette\Application\UI\Form,
        Nette\Application\UI\Presenter;

/**
 * Description of SendArticle
 *
 * @author krystof
 */
class SendArticle {
    
    /** @var ArticleManager */
    private $articleManager;
    
    /** @var CaptchaManager*/
    private $captchaManager;  
    
    /** @var Presenter*/
    private $presenter;
    
    public function create(ArticleManager $articleManager, CaptchaManager $captchaManager, Presenter $presenter){
        
        $this->articleManager = $articleManager;
        $this->captchaManager = $captchaManager;
        $this->presenter = $presenter;
                       
        $form = new Form;
        
        $form->addText('title', 'Titulek');
        
        $form->addTextArea('aboutUser', 'Něco o vás');
        
        $form->addTextArea('text', 'Váš článek\připomínka');
        
              
        if(!$this->presenter->user->isLoggedIn()){
            
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
            $this->presenter->flashMessage('Váš článek byl odeslán redakci');
            $this->presenter->redirect('Homepage:');
        });
        
        return $form;       
    }
    
    public function newWriterFormSucceeded($form, $values){
        
        if(!$this->presenter->user->isLoggedIn()){

            try{
                $this->captchaManager->checkCaptcha($values->captcha);
            }
            catch(\Exception $e){
                $this->presenter->flashMessage($e->getMessage());
                $this->presenter->redirect('this');
            }
            $values->byUser = null;          
        }
        else{
            $values->contact = $this->presenter->user->getIdentity()->mail;
            $values->byUser = $this->presenter->user->id;
        }
        
        
        try{                      
            $this->articleManager->addNewWriter($values);            
                        
        }catch(\Exception $e){
            
            $form->addError($e->getMessage());
        }     
               
    }
    
}
