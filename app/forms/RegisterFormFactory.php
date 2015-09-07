<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
        App\Model\UserManager,
        Nette\Utils\Html;

class RegisterFormFactory {
    
        /** @var UserManager @inject */
	public $userManager;


	/**
	 * @return Form
	 */
	public function create(){
            
		$form = new Form;                		
                
                $form->addText('mail', 'Mail:')
			->setRequired('Zadejte svůj mail')
                        ->setType('email');

                $form->addText('password', 'Nové heslo:')
			->setRequired('Zadejte své nové heslo')
                        ->addRule(Form::PATTERN, 'Heslo musí obsahovat číslici', '.*[0-9].*')
                        ->addRule(Form::PATTERN, 'Heslo musí obsahovat písmeno', '.*[a-z].*')
                        ->addRule(Form::MAX_LENGTH, 'Heslo musí být dlouhé min 6 znaků', 6);
                
                $form->addText('password1', 'Kontrola hesla:')
			->setRequired('Prosím zadejte kontrolu hesla')
                        ->addConditionOn($form["password"], Form::FILLED)
                        ->addRule(Form::EQUAL, "Hesla se musí shodovat !", $form["password"]);
                
                $form->addText('nickName', 'Jméno:')
                        ->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 4)
                        ->setOption('description', 'Pokud chcete můžete pro jednodušší přihlašování zadat přihlašovací jméno');
	}


	public function formSucceeded($form, $values){
            
	try{
            $this->userManager->registerNew($values->mail, $values->password, $values->nickName);
            
        } catch(\Exception $e){
            $form->addError($e->getMessage());
        }
	}
}
