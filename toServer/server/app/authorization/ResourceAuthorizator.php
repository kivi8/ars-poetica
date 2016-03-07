<?php

namespace App\Authorization;

use Nette,
        App\Model\Manager,
        Nette\Security\User;

class ResourceAuthorizator extends Manager{
    
    const 
        fastNews = 'FastNews',
        newActions = 'NewActions',
        article = 'Article',
        comments = 'Comments',
        artTeam = 'ArtTeam',
        mediaArchive = 'MediaArchive',
        user = 'User';
            
    
    private $user;
    
    public function __construct(Nette\Database\Context $database, User $user) {
        
        parent::__construct($database);
        $this->user = $user;        
    }
    
    public function canUse($resource, $segmentId = false){
        
        $tableFor = [
            'FastNews' => 'news',
            'NewActions' => 'action',
            'Article' => 'article',
            'Comments' => 'comment',
            'ArtTeam' => 'artTeam',
            'MediaArchive' => 'news',
        ];
        
        $userId = $this->user->getId();
        
        if(!array_key_exists($resource, $tableFor)){
            
            throw new \Nette\InvalidStateException('User can not use resource: '.$resource);
        }
        
        if($this->user->isAllowed($resource, 'moderate')){
            return true;
        }
        
        if($segmentId === false){
            return false;
        }
        
        $byUser = $this->database
                ->table($tableFor[$resource])
                ->where('id', $segmentId)
                ->fetch()->byUser;
        
        return $userId == $byUser?true:false;
        
    }
}
