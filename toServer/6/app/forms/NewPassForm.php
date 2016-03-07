<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form,
        App\Model\UserManager,
        Nette\Http\Request;

class NewPassForm {
    
    /** @var UserManager */
    private $userManager;
    
    /** @var Request */
    private $request;
    
    public function __construct(UserManager $userManager, Request $request) {
        
        $this->userManager = $userManager;
        $this->request = $request;
    }
    
    /**
     * Lost password form
     * @return Form
     */
    public function create(){
        
        $form = new Form;
        
        $form->addText('mail', 'Zadejte svůj registrovaný mail')
                ->setRequired('Zadejte svůj mail')
                ->addRule(Form::EMAIL, 'Nesprávný formát mailu')
                ->setType('email');  
        
        $form->addPassword('password', 'Vaše přihlašovací heslo po 1.:')
                ->setRequired('Prosím zadejte vaše heslo')
                ->addRule(Form::PATTERN, 'Musí obsahovat číslici', '.*[0-9].*')
                    ->addRule(Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaků', 6);
                
        $form->addPassword('password2', 'Vaše přihlašovací heslo po 2.:')
                ->addRule(Form::FILLED, "Potvrzovací heslo musí být vyplněné !")
                ->addConditionOn($form["password"], Form::FILLED)
                    ->addRule(Form::EQUAL, "Hesla se musí shodovat !", $form["password"]);
        
        
        
        $form->addHidden('passwordCheckCode', $this->request->getQuery('id'));
        
        $form->addSubmit('renew', 'Nastavit nové heslo');
        
        $form->onSuccess[] = [$this, 'succeeded'];
        
        return $form;        
    }
    
    /**
     * Form sent
     * @param Form $form
     * @param $values
     */
    public function succeeded(Form $form, $values){
        
        $id = explode('/', $this->request->url->path);
        
        try {
            
            $this->userManager->newPassword($id[3], $values->mail, $values->password);
            
        } catch (\Exception $e) {
            $form->addError($e->getMessage());
        }
    }
}
