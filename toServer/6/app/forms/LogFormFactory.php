<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
	Nette\Security\User,
        App\Model\RatingManager;

class LogFormFactory extends Nette\Object
{
	/** @var User */
	private $user;
        
        /** @var RatingManager */
	private $rating;
        
	public function __construct(User $user, RatingManager $rating){
            
		$this->user = $user;
                $this->rating = $rating;
	}


	/**
	 * @return Form
	 */
	public function create(){
            
		$form = new Form;
		$form->addText('nick', 'Jméno/mail:')
			->setRequired('Zadejte své jméno nebo mail');

		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte své heslo');

		$form->addCheckbox('remember', 'Zůstat přihlášen');

		$form->addSubmit('send', 'Přihlásit');

		$form->onSuccess[] = [$this, 'formSucceeded'];
                
                
		return $form;
	}


	public function formSucceeded(Form $form, $values){
            
		if ($values->remember) {
			$this->user->setExpiration('14 days', FALSE);
		} else {
			$this->user->setExpiration('20 minutes', TRUE);
		}

		try {
                    $this->rating->setOldSessId();
                    
                    $this->user->login($values->nick, $values->password);
                                 
                    $this->rating->synchronizeUnlogged($this->user->getId());   
                    
		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
