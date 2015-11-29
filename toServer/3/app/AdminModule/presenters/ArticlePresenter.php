<?php

namespace App\AdminModule\Presenters;

use Nette,
        App\Model\ArticleManager,
        App\Forms\SectionForm,
        App\Forms\ArticleForm,
        App\Forms\SerialForm,
        Nette\Application\UI\Multiplier,
        Nette\Application\UI\Form,
        Nette\Utils\ArrayHash;

class ArticlePresenter extends BasePresenter{
    
    const RESSEC = 'Section',
          RES = 'Article';
    
    /** @var ArticleManager @inject */
    public $articleManager;   
    
    public function actionSection(){
        
        if(!$this->user->isAllowed(self::RESSEC, 'moderate')){
            throw new \Nette\Application\ForbiddenRequestException;
        }
    }
    
    public function renderSection(){
        
        $this->template->section = $this->articleManager->getSectionList();
    }
    
    protected function createComponentAddSection(){
        
        $form = (new SectionForm())->create();
        $form->getElementPrototype()->class = 'ajax';
        $form->onSuccess[] = [$this, 'addSectionSucceeded'];
        
        return $form;      
    }
    
    public function addSectionSucceeded(Form $form, $values){
        
        $this->articleManager->addSection($values);
        $this->flashMessage('Přidáno');
        
        if($this->isAjax()){
            $form->setValues([], true);
            $this->redrawControl('menu');
        }
        
        $this->redrawAjax('section');        
    }
    
    protected function createComponentAddSubSection(){
        
        return new Multiplier(function ($underSection){
            
            $form = (new SectionForm())->create($underSection);
            $form->getElementPrototype()->class = 'ajax';
            $form->onSuccess[] = [$this, 'addSubSectionSucceeded'];
                       
            return $form;
        });      
    }
    
    public function addSubSectionSucceeded(Form $form, $values){
        
        if($this->isAjax()){
            $form->setValues([], true);
        }
        
        $this->articleManager->addSubSection($values);
        $this->flashMessage('Přidáno');
        $this->redrawAjax('section');
    }
    
    private $sectionDat;
    
    public function actionUpdateSection($id = '', $sub = 'section'){
        
        if(!$this->user->isAllowed(self::RESSEC, 'moderate')){
            throw new \Nette\Application\ForbiddenRequestException;
        }
        
        if($sub == 'section'){
            $this->sectionDat = $this->articleManager->getSection($id);
        }
        else{
            $this->sectionDat = $this->articleManager->getSection($id, 'subSectionDat');
        }
        
        if(!$this->sectionDat){
            throw new Nette\Application\BadRequestException;
        }
        $this->template->section = $this->sectionDat;     
    }
    
    protected function createComponentUpdateSection(){
        
        $form = (new SectionForm())->create();
        $form['submit']->caption = 'Upravit';
        $form->addHidden('id', '');
        $form->addHidden('sub', isset($this->sectionDat->underSection));
        $form->setValues($this->sectionDat);
        $form->onSuccess[] = [$this, 'updateSectionSucceeded'];
        return $form;
    }
    
    public function updateSectionSucceeded($form, $values){
        
        $this->articleManager->updateSection($values, $values->sub?'subSectionDat':'sectionDat');
        $this->redirect('Article:section');
    }
    
    protected function createComponentAddSerial($section, $subSection){
        
        $form = (new SerialForm())->create($section, $subSection);
        
        $form->onSuccess[] = [$this, 'addSerialSucceeded'];
    }
    
    public function addSerialSucceeded(){
        
        
    }
    
    public function handleDelete($id = '', $subSection = 'sectionDat'){
        
        if(!$this->user->isAllowed(self::RESSEC, 'moderate')){
            throw new \Nette\Application\ForbiddenRequestException;
        }
        
        if(!$id){
            throw new Nette\Application\BadRequestException;
        }
        
        
        $this->articleManager->deleteSection($id, $subSection);
  
        $this->redrawControl('menu');
        $this->redrawAjax('section');
    }

    protected function createComponentOrderForm(){
        
        return new Multiplier(function($dat){
            
            list($id, $sub, $order) = explode('a', $dat);
            
            $form = new Form;
            $form->getElementPrototype()->class = 'ajax';
            $form->addText('order', 'Pořadí')
                    ->setRequired('Zadejte pořadí')
                    ->setValue($order);
            
            $form->addHidden('id', $id);
            $form->addHidden('sub', $sub);
            
            $form->addSubmit('submit', 'Změnit');
            $form->onSuccess[] = [$this, 'orderFormSucceeded'];
            
            return $form;
        });
    }
    
    
    public function orderFormSucceeded(Form $form, $values){
        
        $this->articleManager->changeOrder($values->id, $values->order, $values->sub);
        $this->flashMessage('Změněno');
        $this->redrawControl('menu');
        $this->redrawAjax('section');
    }

    public function actionAddArticle(){
        
        if(!$this->user->isAllowed(self::RES, 'add')){
            throw new \Nette\Application\ForbiddenRequestException;
        }
        
        $this->template->_form = $this[$this->presenter->action];
        
    }
    
    protected function createComponentAddArticle(){
        
        $form = (new ArticleForm($this->articleManager, $this->user))
                ->add();
        
        $form->onSuccess[] = [$this, 'addSucceeded'];   
        
        return $form;
    }
    
    public function addSucceeded(Form $form){
        
        $valuesForm = $form->getValues(true);
        $valuesHttp = $form->getHttpData();
        
        $valuesForm['underSubSection'] = (int) $valuesHttp['underSubSection'];
        $valuesForm['underSerial'] = (int) $valuesHttp['underSerial'];
        
        $values = Nette\Utils\ArrayHash::from($valuesForm); 
        
        $id = $this->articleManager->addArticle($this->user->getId(), $values);
        
        $this->flashMessage('Článek úspěšně přidán');
        $this->redirect('Article:UpdateArticle', $id);
    }
    
        
    public function handleUnderSectionChange($value){
        
        $form = $this->presenter->action;

        if($value){
            
            $this[$form]['underSubSection']->setPrompt('Vyberte')
                    ->setItems($this->articleManager->getSubSectionList($value)+[0=>'Žádná']);
            
            $this[$form]['underSerial']->setPrompt('Vyberte podsekci')
                    ->setItems([]);
        }
        else{
            
            $this[$form]['underSubSection']->setPrompt('Vyberte hlavní sekci')
                    ->setItems([]);
            
            $this[$form]['underSerial']->setPrompt('Vyberte hlavní sekci')
                    ->setItems([]);
        }
        
        $this->redrawControl('underSubSectionSnippet');
    }
    
    public function handleSubSectionChange($value){
        
        $form = $this->presenter->action;
        
        if($value){

            if($this->user->isAllowed(self::RES, 'moderate')){
                $items = $this->articleManager->getSerialList($value);
            }
            else{
                $items = $this->articleManager->getSerialList($value, $this->user->getId());
            }
            
            $this[$form]['underSerial']->setPrompt('Vyberte')
                    ->setItems($items+[0=>'Žádný']);
        }
        else{
            
            $this[$form]['underSerial']->setPrompt('Vyberte podsekci')
                    ->setItems([]);
        }
        $this->redrawControl('underSerialSnippet');
    }
    
    public function handleAddNewAjaxSection($name='', $underSection = '', $underSubSection = ''){
        
        if(!$name){
            throw new Nette\Application\BadRequestException;
        }
        
        if(!$this->user->isAllowed('Section', 'moderate')){
            
            throw new \Nette\Application\ForbiddenRequestException;
        }
        
        $form = $this->presenter->action;
        
        if(!$underSection && !$underSubSection){
            
            $id = $this->articleManager->addSection(ArrayHash::from(['name' => $name]));
            $this[$form]['underSection']
                    ->setItems($this->articleManager->getMainSectionList())
                    ->setValue($id);
            $this->redrawAjax(['underSection' , 'underSubSectionSnippet', 'underSerialSnippet', 'menu']);
        }
        
        if($underSection && !$underSubSection){
            
            $id = $this->articleManager->addSubSection(ArrayHash::from(['name' => $name, 'underSection' => $underSection]));
            $this[$form]['underSubSection']
                    ->setItems($this->articleManager->getSubSectionList($underSection)+[0=>'Žádná'])
                    ->setValue($id);
            $this->redrawAjax(['underSection' , 'underSubSectionSnippet', 'underSerialSnippet']);
        }
        
        if($underSection && $underSubSection){
            
            $id = $this->articleManager->addSerial(ArrayHash::from([
                'name' => $name, 
                'underSection' => $underSection, 
                'underSubSection' => $underSubSection,
                'byUser' => $this->user->id
                ]));
            
            if($this->user->isAllowed(self::RES, 'moderate')){
                $items = $this->articleManager->getSerialList($underSubSection);
            }
            else{
                $items = $this->articleManager->getSerialList($underSubSection, $this->user->getId());
            }
            
            $this[$form]['underSubSection']
                    ->setItems($items+[0=>'Žádná'])
                    ->setValue($id);
            
            $this->redrawAjax(['underSection' , 'underSubSectionSnippet', 'underSerialSnippet']);
        }
        
        
        
    }
    
    private $updateId;
    
    public function actionUpdateArticle($id = ''){
        
        if(!$id || !is_numeric($id)){
            throw new Nette\Application\BadRequestException;
        }
        
        if(!$this->resourceAuthorizator->canUse(self::RES, $id)){
            Nette\Application\ForbiddenRequestException;
        }
        
        $this->updateId = $id;
        
        $this->template->_form = $this[$this->presenter->action];
        $this->template->_form1 = $this['addSection'];
        $this->template->_form2 = $this['addSubSection'];
    }
    
    protected function createComponentUpdateArticle(){
        
        $form = (new ArticleForm($this->articleManager, $this->user))
                ->update($this->updateId, $this->template);
        
        $form->onSuccess[] = (function (){
                $this->redirect('this');
        });
        
        return $form;
    }
    
    
}
