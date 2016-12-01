<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form,
        Nette\Security\User,
        App\Authorization\ResourceAuthorizator,
        App\Model\ArticleManager,
        App\Model\UserManager;

class ArticleForm {
    
    const RES = 'Article';
    
    /** @var ArticleManager */
    private $articleManager;   
    
    /** @var User */
    private $user;
    
    /** @var UserManager */
    private $userManager;
    
    public function __construct(ArticleManager $articleManager, User $user, UserManager $userManager) {
        
        $this->articleManager = $articleManager;
        $this->user = $user;
        $this->userManager = $userManager;
    }
    
    private $setSection;
    private $setSubsection;
    private $setSerial;
    
    public function add($setSection = false, $setSubsection = false, $setSerial = false){
        
        $this->setSection = $setSection;
        $this->setSubsection = $setSubsection;
        $this->setSerial = $setSerial;
        
        return $this->create();       
    }
    
    
    
    public function update($id, Nette\Bridges\ApplicationLatte\Template $template){
        			
        $form = $this->create();
        
        $form['submitArticle']->caption = 'Upravit';
                
        $values = $this->articleManager->getArticle($id);
	
        if(!$values){
            throw new Nette\Application\BadRequestException;
        }
        
        $template->values = $values;
        
        if($this->user->isAllowed(self::RES, 'moderate')){
            $form->addCheckbox('deleted', 'Smazaný');
        }
        
        $form->addHidden('id', $id);
	$form->addHidden('oldSerial', $values->underSerial?$values->underSerial:null);
               
	$form['underSection']->setPrompt('Vyberte hlavní sekci');
	$form['underSubSection']->setPrompt('Vyberte hlavní sekci');
	$form['underSerial']->setPrompt('Vyberte hlavní sekci');
	
        if($values->underSection){
            
            $form['underSubSection']
                    ->setItems($this->articleManager->getSubSectionList($values->underSection)+[0=>'Žádná']);
	    
	    $form['underSubSection']->setPrompt('Vyberte podsekci');
	    $form['underSerial']->setPrompt('Vyberte podsekci');
            
            if($values->underSubSection){
                $form['underSerial']
                    ->setItems($this->articleManager->getSerialList($values->underSubSection)+[0=>'Žádný']);
		$form['underSerial']->setPrompt('Vyberte');
            }
        }
        
        $form->setValues($values);
        
        $form->onSuccess[] = [$this, 'updateSucceeded'];       
        return $form;   
    }
    
    public function updateSucceeded(Form $form){
        
        $valuesForm = $form->getValues(true);
        $valuesHttp = $form->getHttpData();
        
        if(!$valuesForm['photo']->isImage() && $valuesForm['photo']->isOK()){
                $form->addError('Toto není obrázek');
                return ;
        }
        
        $valuesForm['underSubSection'] = (int) $valuesHttp['underSubSection'];
        $valuesForm['underSerial'] = (int) $valuesHttp['underSerial'];
        
        $values = Nette\Utils\ArrayHash::from($valuesForm);
        
        $this->articleManager->updateArticle($values);
    }
    
    private function create(){
        
        $form = new Form;
        
        $form->addText('title', 'Titulek')
                ->setRequired('Zadejte titulek')
                ->setAttribute('placeholder', 'Zadejte titulek');
        
        if($this->user->isAllowed(self::RES, 'moderate')){          
          
            $users = $this->userManager->getUserList();
            
            $form->addSelect('byUser', 'Za uživatele', ['0' => 'Neregistrovaný'] + $users['deleted']+$users['allowed'])
                    ->setValue($this->user->id);
            
            $form->addText('byUnregUser', 'Za neregistrovaného uživatele');
        }
        
        $form->addTextArea('description', 'Popis')
                ->setRequired('Zadejte popis');
        
        $form->addTextArea('text', 'Článek')
                ->setRequired('Zadejte článek');
        
        $form->addText('keyWords', 'Klíčová slova');
        
        $form->addCheckbox('commentsAllow', 'Povolit komentáře');
        
        $form->addCheckbox('voteAllow', 'Povolit hlasování');
        
        $form->addUpload('photo', 'Náhledová fotka');

        if($this->setSection){

            $form->addSelect('underSection', 'Hlavní sekce', $this->articleManager->getMainSectionList())
                ->setValue($this->setSection);

            if($this->setSubsection){
                
                $form->addSelect('underSubSection', 'Podsekce', $this->articleManager->getSubSectionList($this->setSection))
                    ->setValue($this->setSubsection);
                
                if($this->setSerial){
                    $form->addSelect('underSerial', 'Serial', $this->articleManager->getSerialList($this->setSubsection))
                        ->setValue($this->setSerial);		    
                }
                else{
                    $form->addSelect('underSerial', 'Serial', $this->articleManager->getSerialList($this->setSubsection))
                        ->setPrompt('Vyberte');
                    
                }
                
                
            }
            else{
                $form->addSelect('underSubSection', 'Podsekce', $this->articleManager->getSubSectionList($this->setSection))
                ->setPrompt('Vyberte podsekci');
                
                $form->addSelect('underSerial', 'Serial')
                ->setPrompt('Vyberte podsekci');
            }
            
        }
        else{
            $form->addSelect('underSection', 'Hlavní sekce', $this->articleManager->getMainSectionList())
                ->setPrompt('Vyberte hlavní sekci');
            
            $form->addSelect('underSubSection', 'Podsekce')
                ->setPrompt('Vyberte hlavní sekci');
            
            $form->addSelect('underSerial', 'Serial')
                ->setPrompt('Vyberte hlavní sekci');
        }
        
        
        
        
        
        
        
        if($this->user->isAllowed('Section', 'moderate')){
        
        }
        
        
        if($this->user->isAllowed(self::RES, 'publish')){
            $form->addCheckbox('published', 'Publikovaný ihned');
        }
        
        
        $form->addSubmit('submitArticle', 'Odeslat')
		->setValidationScope(false);
        
        return $form;
    }
}
