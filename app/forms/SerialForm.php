<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form;

class SerialForm {
    
    public function create($underSection, $underSubSection){
        
        $form = new Form;
        
        $form->addHidden('underSection', $underSection);
        
        $form->addHidden('underSubSection', $underSubSection);
        
        $form->addText('name', 'Jméno:')
                ->setRequired('Zadejte jméno')
		->setAttribute('placeholder', 'Jméno');
        
        $form->addTextArea('description', 'Popis: ')
		->setAttribute('placeholder', 'Popis');
        
        $form->addSubmit('submit', 'Přidat seriál');
        
        return $form;
    }
}
