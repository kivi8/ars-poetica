<?php

namespace App\AdminModule\Presenters;

use Nette,
    App\Model\TextManager,
    Nette\Application\UI\Multiplier,
    Nette\Application\UI\Form;

class TextPresenter extends BasePresenter{
 
    /** @var TextManager @inject */
    public $textManager;
    
    private $texts;
    
    public function startup() {
	parent::startup();
	if(!$this->user->isAllowed('Article', 'moderate')){
	    throw new Nette\Application\ForbiddenRequestException;
	}
    }
    
    public function actionDefault(){
	
	$this->texts = $this->textManager->getAllText();
	$this->template->texts = $this->texts;
    }
    
    public function createComponentUpdateText(){
	
	return new Multiplier(function($itemId){
	    
	    $form = new Form;
	    
	    $form->elementPrototype->addAttributes(array('class' => 'text'.$itemId));
	    
	    $form->addTextArea('text')
		    ->setAttribute('class', 'codepress html javascript')
		    ->setAttribute('id', 'text'.$itemId)
		    ->setValue($this->texts[$itemId]->text);
	    
	    $form->addHidden('id', $itemId);
	    
	    $form->addSubmit('submit', 'Upravit');
	    
	    $form->onSuccess[] = [$this, 'updateTextSucceeded'];
	    
	    return $form;
	});
    }
    
    public function updateTextSucceeded(Form $form, $values){

	$this->textManager->updateText($values->id, $values->text);
    }
    
}
