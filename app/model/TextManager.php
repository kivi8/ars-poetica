<?php

namespace App\Model;

use Nette;
class TextManager extends Manager{
    
const	SPOLUPRACUJEME = 1,
	CREATIVE_COMMONS = 2,
	O_NAS = 3;


    public function getText($name){
	
	$data = $this->pageText()->where('id', $name)->fetch();
	
	return $data['text'];
    }
    
    public function getAllText(){
	
	return $this->pageText()->fetchAll();
    }
    
    public function updateText($name, $text){
	
	return $this->pageText()->where('id',$name)->update([
	    'text' => $text
	]);
    }
    
    private function pageText(){
	return $this->database->table('pageText');
    }
}
