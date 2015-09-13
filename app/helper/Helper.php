<?php

namespace App\Helper;

use Nette;

class Helper extends \Nette\Object{
    
    /**
     * Combine name form mail or nick
     * @param array $data
     * @return string
     */
    public static function combineUserName($data, $mail = true){
        $raw = [];
        
        foreach($data as $key => $value){
            $raw[$key] = $value;
        }
        
        $title = isset($raw['title'])?$raw['title'].' ':'';
                
        if(!empty($raw['name'])){
            return $title.$raw['name'];
        }
        
        if(!empty($raw['nickName'])){
            return $title.$raw['nickName'];
        }
        
        if(!empty($raw['mail']) && $mail){           
            return $title.$raw['mail'];
        }     
        
        return 'Uživatel';        
    }
    
    /**
     * Returns current time for database
     * @return string
     */
    public static function datTime(){
        return date('Y-m-d H:i:s');
    }
}
