<?php

namespace App\Model;

use Nette,
        Nette\Http\Session,
        Nette\Utils\Strings,
        Nette\Utils\Random,
        Nette\Utils\Image;
        

class CaptchaManager extends \Nette\Object{
    
    /** @var Session */
    private $session;
    
    private $sessSect;
        
    public function __construct(Session $session) {
              
        $this->session = $session;
        $this->sessSect = $session->getSection('session');
        $session->start();
    }
    
    
    /**
     * Generate random captcha question, returns question and hint
     * @return array
     */
    public function generateCaptcha(){       
        
        list($question , $hint) = $this->setFirstQuestion();
                      
        return ['question'=>$question, 'hint'=>$hint];       
    }
    
    public function getCaptchaImage($color, $fontSize){
        
        $string = $this->sessSect->question;        
        
        $fontSize = $fontSize?$fontSize:14;
        
        $fontFile = __DIR__.'/OpenSans-Semibold.ttf';    
        
        $typeSpace = imagettfbbox($fontSize, 0, $fontFile, $string);
        $imageWidth = abs($typeSpace[4] - $typeSpace[0]) + 10;
        $imageHeight = abs($typeSpace[5] - $typeSpace[1]) + 10;
        
        if($color){
            
            $background = $this->getColor($color);         
        }
        else{
            $background = Image::rgb(255, 255, 255);
        }      
        
        $image = Image::fromBlank($imageWidth, $imageHeight, $background);
                                 
        $image->ttfText($fontSize, 0, 0, 20, Image::rgb(0, 0, 0), $fontFile ,$string );
        
        $image->send(Image::PNG);
        
    }
    
    private function getColor($hex){
        
        if(strlen($hex) == 3) {
                $r = hexdec(substr($hex,0,1).substr($hex,0,1));
                $g = hexdec(substr($hex,1,1).substr($hex,1,1));
                $b = hexdec(substr($hex,2,1).substr($hex,2,1));
            } else {
                $r = hexdec(substr($hex,0,2));
                $g = hexdec(substr($hex,2,2));
                $b = hexdec(substr($hex,4,2));
            }
            
            return Image::rgb($r, $g, $b);
    }
    
    /**
     * Check if answer is corect
     * @param string $answer
     * @throws CookieException
     * @return bool
     */
    public function checkCaptcha($answer){       
        
        if(!$this->session->isStarted()){
            
            throw new \Exception('Povolte cookies ve vašem prohlížeči');
        }        
        
        if($this->cutAnswer($answer) != $this->cutAnswer($this->sessSect->answer)){
            
            $this->sessSect->status = 'answBad';
            throw new \Exception('Špatná odpověď na otázku, možná pouze špatně zapsaná');
        }      
            
        $this->sessSect->status = 'answOk';
        
        return true;
    }
    
    public function setNewQuestion(){
        
        list($question, $answer , $hint) = (new QuestionCaptchaManager())->getQuestion();  
        
        $this->sessSect->answer = $answer;
        $this->sessSect->question = $question;
        $this->sessSect->hint = $hint;
        
        return [$question, $hint];
    }
    
    private function setFirstQuestion(){

        if($this->sessSect->status != 'answGen'){
            
            $this->sessSect->status = 'answGen';
            return $this->setNewQuestion();
        }
        
        return [$this->sessSect->question, $this->sessSect->hint];
        
    }


    /**
     * Remove big letters, diacritics, translate numbers and y = i
     * @param string $answer
     * @return string
     */
    private function cutAnswer($answer){
        
        return $this->translateNumber(
                    $this->normalizeY(
                        Strings::toAscii(
                                Strings::lower(
                                        Strings::trim(
                                                Strings::normalize($answer)
                                                )
                                        )
                                )
                        )
                );
    }    
    
    /**
     * From string number make integer
     * @param string $in
     * @return string
     */
    private function translateNumber($in){
        
        $numbers = [
            0 => ['nula'],
            1 => ['jedna', 'jednu'],
            2 => ['dve', 'dva'],
            3 => ['tri'],
            4 => ['ctiri'], //y = i
            5 => ['pet'],
            6 => ['sest'],
            7 => ['sedum', 'sedm'],
            8 => ['osum', 'osm'],
            9 => ['devet'],
        ];
        
        $answers = explode(' ', $in);
        
        foreach($answers as &$answer){
            
            foreach($numbers as $numb => $answ){
            
                if(in_array($answer, $answ) && !is_numeric($answer)){
                    $answer = $numb;
                }
            
            }
        }
        
        return implode(' ', $answers);
        
    }
    
    /**
     * y = i
     * @param string $string
     * @return string
     */
    private function normalizeY($string){
        
        for($pos = 0; $pos < strlen($string); $pos++){
            
            if($string[$pos] == 'y'){
                $string[$pos] = 'i';
            }            
        }
        return $string;
        
    }
    
}

class QuestionCaptchaManager{    
    
    public function getQuestion(){
        
        $functions = get_class_methods($this);
        
        unset($functions[array_keys($functions, __FUNCTION__)[0]]);        
        
        $randFunction = $functions[array_rand($functions)];

        return $this->$randFunction();
    }
    
    private function animalLegs(){
        
        $quest = [
            'kočka' => 4,
            'pes' => 4,
            'kůň' => 4,
            'kuře' => 2,
            'kachna' => 2,
            'vrabec' => 2,
            'slepice' => 2,
            'srnka' => 4,
            'jednonohý pes' => 1,
            'osminohý drak' => 8,
            'člověk' => 2,
        ];
        
        $randomKey = array_rand($quest);
        
        return ['Kolik nohou má '.$randomKey.'?', $quest[$randomKey], ''];
    }
    
    private function animalHeads(){
        
        $quest = [
            'kočka' => 1,
            'pes' => 1,
            'kůň' => 1,
            'kuře' => 1,
            'kachna' => 1,
            'člověk' => 1,
            'slepice' => 1,
            'vrabec' => 1,
            'srnka' => 2,
            'pětihlavá saň' => 5
        ];
        
        $randomKey = array_rand($quest);
        
        return ['Kolik hlav má '.$randomKey.'?', $quest[$randomKey], ''];
    }
    
    private function lastDigit(){
        
        $rand1 = rand(100, 99999);
        
        $rand2 = rand(100, 999);
        
        return ['Poslední číslice v čísle '.$rand1.' ?', (int)$rand1%10, 'Na příklad pro '.$rand2.' je odpověď '.(int)$rand2%10];
    }
    
    private function firstDigit(){
        
        $rand1 = rand(1000, 9999);
        
        $rand2 = rand(100, 999);
        
        return ['První číslice v čísle '.$rand1.' ?', (int)((int)$rand1/1000), 'Na příklad pro '.$rand2.' je odpověď '.(int)((int)$rand2/100)];
    }
    
    private function midDigit(){
        
        $rand1 = rand(10000, 99999);
        
        $rand2 = rand(100, 999);
        
        return ['Prostřední číslice v čísle '.$rand1.' ?', ((int)((int)$rand1/100))%10, 'Na příklad pro '.$rand2.' je odpověď '.((int)((int)$rand2/10)%10)];
    }
    
    private $days = [
        1=>'pondělí',
        2=>'úterý',
        3=>'středa',
        4=>'čtvrtek',
        5=>'pátek',
        6=>'sobota',
        7=>'neděle',
    ];
    
    private function tomorrow(){    
        
        $randomKey = rand(1, 7);
        
        $tomorow = $randomKey == 7?1:$randomKey+1;
        return ['Pokud je dnes '.$this->days[$randomKey].' zítra bude ?', $this->days[$tomorow], ''];
        
    }
    
    private function yesterday(){    
        
        $randomKey = array_rand($this->days);
        
        $was = 'o';
        
        $yest = $randomKey == 1?7:$randomKey-1;
        
        if($yest == 3 || $yest == 6 || $yest == 7){
            $was = 'a';
        }
        
        if($yest == 4 || $yest == 5){
            $was = '';
        }   
        
        return ['Pokud je dnes '.$this->days[$randomKey].' včera byl'.$was.' ?', $this->days[$yest--], ''];
        
    }
    
    private $numbers = [
            0 => 'nula',
            1 => 'jedna',
            2 => 'dva',
            3 => 'tři',
            4 => 'čtyři',
            5 => 'pět',
            6 => 'šest',
            7 => 'sedm',
            8 => 'osm',
            9 => 'devět'
        ];
    
    private function countPlus(){
        
        $numbers = $this->numbers;       
        
        unset($numbers[9]);
        
        $randNum1 = array_rand($numbers);
        
        for($uns = 10-$randNum1; $uns <= 8; $uns++){
            unset($numbers[$uns]);
        }
        
        $randNum2 = array_rand($numbers);
        
        $res = $randNum1+$randNum2;
        
        return [Strings::firstUpper($this->numbers[$randNum1]).' plus '.$this->numbers[$randNum2].' se rovná ', $res, ''];
    }
    
    private function countMinus(){
        
        $randNum1 = array_rand($this->numbers);        
        
        $randNum2 = array_rand($this->numbers);
        
        if($randNum1 > $randNum2){
            
            $max = $randNum1;
            $min = $randNum2;
        }else{
            
            $max = $randNum2;
            $min = $randNum1;
        }
        
        $res = $max-$min;
        
        return [Strings::firstUpper($this->numbers[$max]).' mínus '.$this->numbers[$min].' se rovná ', $res, ''];
    }  
}