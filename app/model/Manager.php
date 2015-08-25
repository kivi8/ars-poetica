<?php

namespace App\Model;

use Nette;
        

class Manager extends Nette\Object{
    
    /** @var Nette\Database\Context */
    protected $database;
    
    public function __construct(Nette\Database\Context $database){
        
        $this->database = $database;
    }
}
