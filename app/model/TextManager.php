<?php

namespace App\Model;

use Nette;
class TextManager extends Manager{
    
const	EDITORIAL = 1,
	CREATIVE_COMMONS = 2,
	KONTAKT = 3,
	O_NAS = 4,
	REDAKCE = 5;


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
