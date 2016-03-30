<?php

namespace App\Components;

use Nette,
    App\Model\RatingManager,
    Nette\Security\User,
    Nette\Application\UI\Control,
    Nette\Http\Session;

class RatingControl extends Control{
   
    /** @var RatingManager */
    private $ratingManager;
    
    /** @var User */
    private $userId;
    
    /** @var Session */
    private $session;  
    
    /** @var int */
    private $points = 5;
    
    /** @var int */
    private $from = 1;
    
    /** @var string */
    private $mode;
    
    const MODE_STARS = 'stars',
          MODE_PLUS = 'plus';
    
    
    public function __construct(RatingManager $ratingManager, User $user, Session $session, $forWhat, $forId, $mode ,$points){
               
        $this->ratingManager = $ratingManager;
        $this->userId = $user->isLoggedIn()?$user->id:false;
        $this->session = $session;
        
        $this->mode = $mode;
        $this->points = $points;
        
        if($mode == self::MODE_PLUS){
            $this->from = -1;
            $this->points = 3;
        }
        
        $this->ratingManager->setManager($forWhat, $forId, $this->userId, $this->session);
        
    }
    
    public function render($onlyShow = false){              
        
        $template = $this->getTemplate();
        $template->setFile(__DIR__.'/templates/Rating/'.$this->mode.'.latte');
        
        $template->points = $this->points;
        
        switch($this->mode){
            
            case self::MODE_STARS:
                $template->average = $this->ratingManager->getAverageVote();
                break;
            
            case self::MODE_PLUS:
                $template->sum = $this->ratingManager->getSumVote();
                break;
            
        }
        
        $template->onlyShow = $onlyShow;
        
        $template->userVote = $this->ratingManager->getUserVote();
        $template->render();
    }
    
    public function handleRate($points){
        
        if(!$points || !is_numeric($points) || $points > $this->points || $points < $this->from ){
            throw new Nette\Application\BadRequestException;
        }
        
        if(\App\Helper\Helper::isIndexBot()){
            return;
        }
                
        if($this->ratingManager->addVote($points)){
            $this->redrawAjax('Hodnocení přidáno');
        }
                
        
    }
    
    public function handleDel(){
        
        if($this->ratingManager->removeVote()){
            $this->redrawAjax('Hodnocení smazáno');
        }
    }
    
    private function redrawAjax($flash = false){
        
        if($this->presenter->isAjax()){
            $this->redrawControl('rating');
            
            if($flash){
                $this->flashMessage($flash);
                $this->redrawControl('flashMessageRating');                
            }
        }
        else{
            $this->redirect('this');
        }
    }
    
    
    
}

interface IRatingControlFactory {
    
    /** @return \App\Components\RatingControl */
    function create($forWhat, $forId, $mode = RatingControl::MODE_STARS, $points = 5);
}
