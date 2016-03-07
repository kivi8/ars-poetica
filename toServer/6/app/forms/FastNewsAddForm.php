<?php

namespace App\Forms;

use Nette,
        Nette\Application\UI\Form;

class FastNewsAddForm {
    
    public function create(){
        
        $form = new Form;
        
        $form->addText('title', 'Napis')
                ->setRequired('Musíte zadat titulek');
        
        $form->addTextArea('text', 'Text')
                ->setRequired('Musíte zadat text');
        
        $form->addText('keyWords', 'Klíčová slova');
        
        $form->addSubmit('submit', 'Odeslat');
        
        return $form;
    }
}
