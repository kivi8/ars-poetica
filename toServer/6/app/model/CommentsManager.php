<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use Nette,
    App\Helper\Helper,
    App\Authorization\ResourceAuthorizator,
    App\Authorization\AuthorizatorFactory,
    Nette\Utils\Paginator;

class CommentsManager extends Manager{
    
    /** @var string */
    private $forWhat;
    
    /** @var int */
    private $forId;
    
    /** @var int */
    private $userId;
    
    /** @var ResourceAuthorizator */
    private $resourceAuthorizator;
    
    /** @var AuthorizatorFactory */
    private $authorizator;
    
    public function __construct(Nette\Database\Context $database, ResourceAuthorizator $resourceAuthorizator, AuthorizatorFactory $authorizator) {
        
        parent::__construct($database);
        $this->resourceAuthorizator = $resourceAuthorizator;
        $this->authorizator = $authorizator;
    }


    public function setComments($forWhat, $forId, $userId){
        
        $this->forWhat = $forWhat;
        $this->forId = $forId;
        $this->userId = $userId;
    }
    
    public function getComments(Paginator $paginator){
        
        return $this->commentDat()
                ->where('forWhat = ? AND forId = ?', $this->forWhat, $this->forId)
                ->limit($paginator->getLength(), $paginator->getOffset())
                ->order('date DESC')
                ->fetchAll();
    }
    
    public function getSingleComment($id, $sub = false){
        
        return $this->commentDat($sub)->where('id', $id)->fetch();
    }
    
    public function addComment($values, $sub = false){        
        
        $data = [
            'byUser' => $this->userId,
            'unregName' => isset($values->unregname)?$values->unregname:null,
            'date' => Helper::datTime(),
            'text' => $this->fixComment($values->text),
            'deleted' => 0
        ];
        
        if($sub !== false){
            $data['forComment'] = $sub;                                  
        }
        else{
            
            $data['forId'] = $this->forId;
            $data['forWhat'] = $this->forWhat;  
        }
        
        return $this->commentDat($sub)->insert($data);
        
    }
    

    
    public function updateComment($values){
        
        $sub = $values->sub === 'false'?false:true;
        
        if(!$this->canUserChange($values->id, $sub)){
            
            throw new NoAccessException('No access');            
        }                    
        
        
        return $this->commentDat($sub)->where('id', $values->id)->update([
                'text' => $values->text. '<p>'.date('j.n.Y G:i').' provedena poslední změna</p>',
                'deleted' => $values->deleted,
                'unregName' => isset($values->unregName)?$values->unregName:null,
            ]);
    }
    
    public function countComments(){
        
        return $this->commentDat()
                ->where('forWhat = ? AND forId = ?', $this->forWhat, $this->forId)
                ->count();
    }
    
    private function fixComment($text){      
        $escaped = \Latte\Runtime\Filters::escapeHtml($text, ENT_COMPAT);
        $esmiled = $this->smileReplace($escaped); 
        
        $reg = '#(http://|ftp://|(www\.))([\w\-]*\.[\w\-\.]*([/?][^\s]*)?)#'; 
        return preg_replace_callback($reg,'self::createLink',$esmiled);
    }
    
    private function createLink($dat){     
        $adr = $dat[2].$dat[3];
        if($dat[1] == 'www.'){
            $sub = 'http://';
        }
        else{
            $sub = $dat[1];
        }
        
        if(strlen($adr) > 20){
           $val = substr($dat[2].$dat[3],0,18).'&hellip;';
        }
        else{
           $val = $adr;
        }
        return '<a target="_blank" rel="nofollow" href="'.$sub.$adr.'">'.$val.'</a>';
    }
    
    private function smile($numb){
        return '<span class="smile" style="background-position: 0px -'.$numb.'px;"></span>';
    }
    
    private function smileReplace($text){
        $smiles = array(
            //smile
            ':-)' => $this->smile(122),
            ':)' => $this->smile(122),
            ':]' => $this->smile(122),
            '=)' => $this->smile(122),
            //frown
            ':-(' => $this->smile(77),
            ':(' => $this->smile(77),
            ':[' => $this->smile(77),
            '=(' => $this->smile(77),
            //grin
            ':-D' => $this->smile(122),
            ':D' => $this->smile(122),
            '=D' => $this->smile(122),
            //gasp
            ':-O' => $this->smile(92),
            ':O' => $this->smile(92),
            ':-o' => $this->smile(92),
            ':o' => $this->smile(92),
            //glasses
            '8-)' => $this->smile(107),
            '8)' => $this->smile(107),
            'B-)' => $this->smile(107),
            'B)' => $this->smile(107),
            //grumpy            
            '>:(' => $this->smile(137),
            '>:-(' => $this->smile(137),
            //cry
            ":'(" => $this->smile(46),
            //devil
            '3:)' => $this->smile(61),
            '3:-)' => $this->smile(61),
            //angel
            'O:)' => $this->smile(0),
            'O:-)' => $this->smile(0),
            //kiss
            ':-*' => $this->smile(167),
            ':*' => $this->smile(167),
            //kiki
            '^_^' => $this->smile(152),
            //confused
            'o.O' => $this->smile(31),
            'O.o' => $this->smile(31),
            //pacman
            ':v' => $this->smile(182),
            //curly lips
            ':3' => $this->smile(16),
            //like
            '(y)' => $this->smile(197),                      
        );              
        return strtr($text, $smiles);
    }
    
    
    private function canUserChange($commetId, $sub = false){
        
        $under = $sub?'Under':'';
        
        return $this->resourceAuthorizator->canUse('Comments'.$under, $commetId);
    }
    
    
    private function commentDat($sub = false){
        
        $under = $sub?'Under':'';
        
        return $this->database->table('comment'.$under);
    }
    
    
    
}

class NoAccessException extends \Exception{
    
}
