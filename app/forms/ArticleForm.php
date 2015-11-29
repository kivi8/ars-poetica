<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form,
        Nette\Security\User,
        App\Authorization\ResourceAuthorizator,
        App\Model\ArticleManager;

class ArticleForm {
    
    const RES = 'Article';
    
    /** @var ArticleManager */
    private $articleManager;   
    
    /** @var User */
    private $user;
    
    public function __construct(ArticleManager $articleManager, User $user) {
        
        $this->articleManager = $articleManager;
        $this->user = $user;
    }
    
    public function add(){
        
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
               
        if($values->underSection){
            
            $form['underSubSection']
                    ->setItems($this->articleManager->getSubSectionList($values->underSection)+[0=>'Žádná']);
            
            if($values->underSubSection){
                $form['underSerial']
                    ->setItems($this->articleManager->getSerialList($values->underSubSection)+[0=>'Žádný']);
            }
        }
        
        $form->setValues($values);
        
        $form->onSuccess[] = [$this, 'updateSucceeded'];       
        return $form;   
    }
    
    public function updateSucceeded(Form $form){
        
        $valuesForm = $form->getValues(true);
        $valuesHttp = $form->getHttpData();
        
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
        
        $form->addTextArea('text', 'Článek')
                ->setRequired('Zadejte článek');
        
        $form->addText('keyWords', 'Klíčová slova');
        
        $form->addCheckbox('commentsAllow', 'Povolit komentáře');
        
        $form->addCheckbox('voteAllow', 'Povolit hlasování');
        
        $form->addSelect('underSection', 'Hlavní sekce', $this->articleManager->getMainSectionList())
                ->setPrompt('Vyberte hlavní sekci');
        
        $form->addSelect('underSubSection', 'Podsekce')
                ->setPrompt('Vyberte hlavní sekci');
        
        $form->addSelect('underSerial', 'Serial')
                ->setPrompt('Vyberte hlavní sekci');
        
        if($this->user->isAllowed('Section', 'moderate')){
        
        }
        
        
        if($this->user->isAllowed(self::RES, 'publish')){
            $form->addCheckbox('published', 'Publikovaný ihned');
        }
        
        $form->addSubmit('submitArticle', 'Odeslat');
        
        return $form;
    }
}
