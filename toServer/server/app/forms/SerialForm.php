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
                ->setRequired('Zadejte jméno');
        
        $form->addTextArea('description', 'Popis: ');
        
        $form->addSubmit('submit', 'Přidat');
        
        return $form;
    }
}
