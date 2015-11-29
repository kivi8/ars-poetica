<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form;

class SectionForm {
    
    public function create($underSection = false, $underSubSection = false){
        
        $form = new Form;
        
        if($underSection){
            $form->addHidden('underSection', $underSection);
        }
        
        if($underSubSection){
            $form->addHidden('underSubSection', $underSubSection);
        }
        
        $form->addText('name', 'Jméno:')
                ->setRequired('Zadejte jméno');
        
        $form->addTextArea('description', 'Popis: ');
        
        $form->addSubmit('submit', 'Přidat');
        
        return $form;
    }
}
