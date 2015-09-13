<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
        Nette\Utils\Html,
        App\Model\UserManager;

class RegisterFormFactory {           
    
        /** @var UserManager */
        private $userManager;
    
        public function __construct(UserManager $userManager){
            $this->userManager = $userManager;
        }

	/**
	 * @return Form
	 */
	public function create(){
            
		$form = new Form;                		
                
                $form->addText('mail', 'Mail:')
			->setRequired('Zadejte svůj mail')
                        ->addRule(Form::EMAIL, 'Nesprávný formát mailu')
                        ->setType('email');

                $form->addText('password', 'Nové heslo:')
                        ->setType('password')
			->setRequired('Zadejte své nové heslo')
                        ->addRule(Form::PATTERN, 'Heslo musí obsahovat číslici', '.*[0-9].*')
                        ->addRule(Form::PATTERN, 'Heslo musí obsahovat písmeno', '.*[a-z].*')
                        ->addRule(Form::MIN_LENGTH, 'Heslo musí být dlouhé min 6 znaků', 6);
                                               
                $form->addText('nickName', 'Jméno:')                       
                        ->setOption('description', Html::el('p')
                                ->setHtml('Pokud chcete můžete pro jednodušší přihlašování zadat jméno'))
                        ->addCondition(Form::FILLED)
                        ->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 4);
                
                $form->addSubmit('register', 'Registrovat');
                
                $form->onSuccess[] = [$this, 'formSucceeded'];
                
                return $form;
	}


	public function formSucceeded($form, $values){
            
	try{
            
            $this->userManager->registerNew($values->mail, $values->password, $values->nickName);
            
        } catch(\Exception $e){
            
            $form->addError($e->getMessage());
        }
	}
}
