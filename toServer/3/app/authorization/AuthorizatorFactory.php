<?php

namespace App\Authorization;

use Nette,
    Nette\Security\IAuthorizator,
    Nette\Database\Context;

class AuthorizatorFactory extends Nette\Object implements IAuthorizator{
    
    /** @var Context */
    private $database;
    
    public function __construct(Context $database) {
        
        $this->database = $database;
    }
    /*
     * default: 00|00|000|00|0000|000|000|0
     */
    
    private $resourcesPrivilegesDefault = [
        'FastNews' => ['add'=>false, 'moderate'=>false],
        'NewActions' => ['add'=>false, 'moderate'=>false],
        'Article' => ['add'=>false, 'moderate'=>false, 'publish' => false],
        'Comments' => ['addAsAdmin'=>false, 'moderate'=>false],
        'User' => ['add'=>false, 'see'=>false, 'prohibit'=>false, 'moderate'=>false],
        'ArtTeam' => ['add'=>false, 'see'=>false, 'moderate'=>false],
        'MediaArchive' => ['add'=>false, 'see'=>false, 'moderate'=>false],
        'Section' => ['moderate'=>false],
    ];
       
    private $privileges = [];
    
    /**
     * Check is somethink allowed
     * @param string $role
     * @param string $resource
     * @param string $privilege
     * @return boolean
     */
    public function isAllowed($role, $resource, $privilege){              
        
        if($resource == 'Admin' && $privilege == 'can'){
            
            return \Nette\Utils\Strings::contains($role, '1');
        }
        
        $this->checkParams($resource, $privilege);
        $this->parseRole($role);             
        
        return $this->privileges[$resource][$privilege];
    }
    
    /**
     * Parse role to privileges
     * @param string $role
     */
    private function parseRole($role){
        
        if($role === 'guest'){
            $this->privileges = $this->resourcesPrivilegesDefault;
            return;
        }
        
        $userResources = explode('|', $role);        
        
        $resourceCount = 0;
        
        foreach($this->resourcesPrivilegesDefault as $resource=>$privileges){                       
            
            $privilegeCount = 0;
            
            foreach($privileges as $privilege=>$value){
                
                $this->privileges[$resource][$privilege] = $userResources[$resourceCount][$privilegeCount]?true:false;
                $privilegeCount++;
            }
            $resourceCount++;
        }
        
    }
    
    /**
     * Check if resource and privilege exist
     * @param string $resource
     * @param string $privilege
     * @throws Nette\InvalidStateException
     */
    private function checkParams($resource, $privilege){
        
        if(!array_key_exists($resource, $this->resourcesPrivilegesDefault)){
            throw new Nette\InvalidStateException("Resource '$resource' does not exist");
        }

        if(!array_key_exists($privilege, $this->resourcesPrivilegesDefault[$resource])){
           throw new Nette\InvalidStateException("Privilege '$privilege' does not exist");
        }
    }
}
