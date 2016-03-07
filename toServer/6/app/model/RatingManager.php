<?php

namespace App\Model;

use Nette,
    Nette\Http\Session;

class RatingManager extends Manager{
    
    /** @var int */
    private $forWhat;
    
    /** @var int */
    private $forId;
    
    /** @var int */
    private $userId;
    
    /** @var bool */
    private $logged;
    
    /** @var Session */
    private $session;
    
    public function __construct(Nette\Database\Context $database, Session $session) {
        parent::__construct($database);
        $this->session = $session;
    }
    
    public function setManager($forWhat, $forId, $userId){
                       
        $this->forWhat = $forWhat;
        $this->forId = $forId;                       
        
        if($userId){
            $this->userId = $userId;
            $this->logged = true;
        }
        else{
            
            $voteId = $this->session->getSection('voteId');
            if(empty($voteId->id)){
                $voteId->id = \Nette\Utils\Random::generate(50);
            }
            $this->userId = $voteId->id;
            
            $this->logged = false;
        }
        
    
    }
    
    public function addVote($value){
        
        if(!$this->checkVoted()){
           
            return $this->voteDat()->insert([
                'voteForWhat' => $this->forWhat,
                'voteForId' => $this->forId,
                'value' => $value,
                'byUser' => $this->logged?$this->userId:null,
                'byUnlogged' => !$this->logged?$this->userId:null
            ]);
        }
        
        $this->changeVote($value);
       
        return true; 
    }
    
    public function checkVoted(){
        
        return $this->logged?$this->checkVotedLogedIn():$this->checkVotedNotLogedIn();
        
    }
    
    private function checkVotedLogedIn(){
        
        return $this->voteDat()
                ->where('voteForWhat = ? AND voteForId = ? AND byUser = ?', $this->forWhat, $this->forId, $this->userId)
                ->fetch()?true:false;
    }
    
    private function checkVotedNotLogedIn(){
        
        return $this->voteDat()
                ->where('voteForWhat = ? AND voteForId = ? AND byUnlogged = ?', $this->forWhat, $this->forId, $this->userId)
                ->fetch()?true:false;
        
    }
    
    public function removeVote(){
        
        if(!$this->userId){
            return false;
        }
        
        return $this->voteDat()
                ->where('voteForWhat = ? AND voteForId = ? AND (byUser = ? OR byUnlogged = ?)', $this->forWhat, $this->forId, $this->userId, $this->userId)
                ->delete();
        
    }
    
    public function changeVote($toValue){
        
        if($this->userId === false){
            return false;
        }
        
        return $this->voteDat()
                ->where('voteForWhat = ? AND voteForId = ? AND (byUser = ? OR byUnlogged = ?)', $this->forWhat, $this->forId, $this->userId, $this->userId)
                ->update(['value' => $toValue]);
        
    }
    
    public function getAverageVote(){
        
        $dat = $this->voteDat()              
                ->where('voteForWhat = ? AND voteForId = ?', $this->forWhat, $this->forId)               
                ->select('AVG(value)')
                ->fetch();
        
        if(!$dat){
            return 0;
        }
        
        foreach($dat as $d){
            return $d;
        }             
    }
    
    public function getSumVote(){
        
        $dat = $this->voteDat()              
                ->where('voteForWhat = ? AND voteForId = ?', $this->forWhat, $this->forId)               
                ->select('SUM(value)')
                ->fetch();
        
        if(!$dat && $dat !== 0){
            return false;
        }
        
        foreach($dat as $d){
            return $d;
        }             
    }
    
    public function getUserVote(){
        
        if($this->userId === false){
            return false;
        }
        
        $dat = $this->voteDat()->where('voteForWhat = ? AND voteForId = ? AND (byUser = ? OR byUnlogged = ?)', $this->forWhat, $this->forId, $this->userId, $this->userId)->fetch();
        
        return isset($dat->value)?$dat->value:false;
    }
    
    
    private $oldId;
    
    public function setOldSessId(){
        
        $id = $this->session->getSection('voteId');
        
        if(empty($id->id)){
            $this->oldId = false;
        }
        else{
            $this->oldId = $id->id;
        }
        
    }
    
    
    public function synchronizeUnlogged($loggedId){
        
        if($this->oldId === false){
            return true;
        }
             
        $data = $this->voteDat()->where('byUser IS NULL AND byUnlogged = ?', $this->oldId);
        
        
        foreach($data as $did){
            
            $this->voteDat()
                    ->where('voteForWhat = ? AND voteForId = ? AND byUser = ?', $did->voteForWhat, $did->voteForId, $loggedId)
                    ->update(['value' => $did->value]);
            
            $did->delete();
            
        }
        
    }
    
    private function voteDat(){
        return $this->database->table('vote'); 
    }
    
}
