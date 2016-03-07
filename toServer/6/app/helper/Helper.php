<?php

namespace App\Helper;

use Nette;

class Helper extends \Nette\Object{
    
    /**
     * Combine name from mail or nick
     * @param array $data
     * @param bool $mail
     * @return string
     */
    public static function combineUserName($data, $mail = true){
        
        $raw = [];
        
        if(!$data){
            return 'Uživatel'; 
        }
        
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
    
    public static function timeInterval($date){
        
        return (new TimeInterval())->timeInterval($date);       
    }
    
    /**
     * Translate gender from database
     * @param string $gender
     * @return string
     */
    public static function translateGender($gender){
        
        $genders = ['fe'=>'Žena','ma'=>'Muž','no'=>'Neuvedeno'];
        return $genders[$gender];        
    }
}

class TimeInterval
{

   public function timeInterval($datum)
   {
       if( empty($datum) ) {
           return "Nebyl předán datum.";
       }
 
       $perioda       = array("sekundy", "minuty", "hodiny", "dny", "týdny", "měsíce", "roky");
       $delka         = array("60","60","24","7","4.35","12");
 
       $nyni          = time();
       $unixovy_datum = strtotime($datum);
 
       if( empty($unixovy_datum) ) {
           return "Chybný formát datumu.";
       }
 
       // minulý čas nebo budoucí čas?
       //
       if( $nyni > $unixovy_datum ) {
           $rozdil      = $nyni - $unixovy_datum;
           $slovesnyCas = "před";
 
       } else {
           $rozdil      = $unixovy_datum - $nyni;
           $slovesnyCas = "za";
       }
 
       for($j = 0; $rozdil >= $delka[$j] && $j < count($delka)-1; $j++) {
           $rozdil /= $delka[$j];
       }
 
       $rozdil = round($rozdil);
 
       if( $slovesnyCas == "před" ) {
         switch ($perioda[$j]) {
          case "sekundy":
            if( $rozdil == 1 ) {
                $perioda[$j] = "sekundou";
                $rozdil = "jednou";
            }else{
                $perioda[$j] = "sekundami";
            }
            break;
 
          case "minuty":
            if( $rozdil == 1 ) {
                $perioda[$j] = "minutou";
                $rozdil = "";
            }else{
                $perioda[$j] = "minutami";
            }
            break;  
 
          case "hodiny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "hodinou";
                $rozdil = "";
            }else{
                $perioda[$j] = "hodinami";
            }
            break;  
 
          case "dny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "včera";
                $rozdil = "";
                $slovesnyCas = "";
            }else{
                $perioda[$j] = "dny";
            }
            break;  
 
          case "týdny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "týdnem";
                $rozdil = "";
            }else{
                $perioda[$j] = "týdny";
            }
            break; 
 
          case "měsíce":
            if( $rozdil == 1 ) {
                $perioda[$j] = "měsícem";
                $rozdil = "";
            }elseif( $rozdil == 12 ){
                $perioda[$j] = "rokem";
                $rozdil = "";
            }else{
               $perioda[$j] = "měsíci";
            }
            break; 
 
          case "roky":
            if( $rozdil == 1 ) {
                $perioda[$j] = "rokem";
                $rozdil = "";
            }else{
                $perioda[$j] = "roky";
            }
            break;
          default:
            break;
          }
       }else{    // "za ..."
         switch ($perioda[$j]) {
         case "sekundy":
            if( $rozdil == 1 ) {
                $perioda[$j] = "sekundu";
                $rozdil = "jednu";
            }else{
                $perioda[$j] = "sekund";
            }
            break;
 
          case "minuty":
            if( $rozdil == 1 ) {
                $perioda[$j] = "minutu";
                $rozdil = "";
            }else{
                $perioda[$j] = "minut";
            }
            break;   
 
          case "hodiny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "hodinu";
                $rozdil = "";
            }elseif( $rozdil >= 2 && $rozdil < 5){
               $perioda[$j] = "hodiny";
            }elseif( $rozdil >= 5 ){
               $perioda[$j] = "hodin";
            }
            break;   
 
          case "dny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "zítra";
                $rozdil = "";
                $slovesnyCas = "";
            }else{
               if( $rozdil > 1 && $rozdil < 5 ) {
                $perioda[$j] = "dny";
               }else{
                  $perioda[$j] = "dní";
               }
            }
            break;   
 
          case "týdny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "týden";
                $rozdil = "";
            }elseif( $rozdil == 2 ){
               $perioda[$j] = "týden";
                $rozdil = "příští";
            }elseif( $rozdil > 2 && $rozdil < 5 ){
               $perioda[$j] = "týdny";
            }elseif( $rozdil >= 5 ){
               $perioda[$j] = "týdnů";
            }
            break;   
 
          case "měsíce":
            if( $rozdil == 1 ) {
                $perioda[$j] = "měsíc";
                $rozdil = "";
            }elseif( $rozdil >= 2 && $rozdil < 5 ){
               $perioda[$j] = "měsíce";
            }elseif( $rozdil == 12 ){
                $perioda[$j] = "rok";
                $rozdil = "";
            }elseif( $rozdil >= 5 ){
               $perioda[$j] = "měsíců";
            }
            break;  
 
          case "roky":
            if( $rozdil == 1 ) {
                $perioda[$j] = "rok";
                $rozdil = "";
            }elseif( $rozdil == 2 ){
               $perioda[$j] = "roky";
            }
            break;  
 
          default:
 
            break;
          }
       }
       
       if($rozdil == 0 && $perioda[$j] == 'sekund'){
           return 'Teď';
       }
       
       return "{$slovesnyCas} $rozdil $perioda[$j]";
   }
 
   public function pocetDni($datum = "")
   {
      $sekund = $this->datum_na_timestamp($datum);
 
      $rozdil = time() - $sekund;
      $dni = floor($rozdil / (60 * 60 * 24));
 
    return $dni;
   }
 

   private function datum_na_timestamp($datetime = "")
   {
      // použitelné pouze pro 10 nebo 19 znakové vyjádření ( 0000-00-00  nebo 0000-00-00 00:00:00 )
      $delka = strlen($datetime);
 
      if(!($delka == 10 || $delka == 19)) {
         return false;
      }
 
      $datum = $datetime;
      $hours = 0;
      $minutes = 0;
      $seconds = 0;
 
      // DATETIME
      if($delka == 19)
      {
         list($datum, $time) = explode(" ", $datetime);
         list($hodin, $minut, $sekund) = explode(":", $time);
      }
 
      list($rok, $mesic, $den) = explode("-", $datum);
 
      return mktime($hodin, $minut, $sekund, $mesic, $den, $rok);
   }
 
}
