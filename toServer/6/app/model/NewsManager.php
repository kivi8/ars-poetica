<?php

namespace App\Model;

use Nette,
    Nette\Utils\Strings;

class NewsManager extends Manager{
    
    /**
     * All news
     * @param int $limit
     * @return Nette\Database\Context
     */    
    public function getNewsList($limit, $ofset = 0, $deleted = 0, $userId = false){
        
        if($userId){
            
            return $this->newsDat()
                ->where('deleted = ? AND byUser = ?', $deleted, $userId)
                ->limit($limit, $ofset)
                ->order('date DESC')
                ->fetchAll();
        }
        
        return $this->newsDat()
                ->where('deleted = ?', $deleted)
                ->limit($limit, $ofset)
                ->order('date DESC')
                ->fetchAll();
    }
    
    public function getNewsCount($deleted, $userId = false){
        
        if($userId){
            
            return $this->newsDat()->where('deleted = ? AND byUser = ?',$deleted?1:0, $userId)->count();
        }
        
        return $this->newsDat()->where('deleted = ?',$deleted?1:0)->count();
    }
    
    /**
     * Get one news by url
     * @param string $url
     * @param int $id
     * @return array
     */
    public function getOneNews($url, $id = false){
        
        return [$this->newsDat()
                ->where($id?'id':'url', $url)
                ->fetch()];
    }
    
    /**
     * Add to database
     * @param array $values
     * @param int $userId
     */
    public function addNews($values, $userId){
                
        $this->newsDat()->insert([
            'byUser' => $userId,
            'url' => $this->checkUnique($values->title),
            'title' => $values->title,
            'text' => $values->text,
            'keyWords' => $values->keyWords?$values->keyWords:'',
            'date' => \App\Helper\Helper::datTime(),
        ]);
    }
    
    
    public function updateNews($values, $id){
        
        $this->newsDat()->where('id', $id)->update([
            'title' => $values->title,
            'url' => $this->checkUnique($values->title, $id),
            'text' => $values->text,
            'keyWords' => $values->keyWords,
            'deleted' => $values->deleted?1:0
        ]);
    }
    
    /**
     * Check if url is unique. If not add number
     * @param string $title
     * @return string
     */
    private function checkUnique($title, $id = null){
        
        $url = Strings::webalize($title);
        
        $dat = $this->newsDat()->where('url = ?', $url)->fetch();
        
        if($dat){
            
            if($id == $dat->id){
                return $url;
            }
            
            $last = $dat->url[strlen($dat->url)-1];
                      
            if(is_numeric($last)){
                
                $title[strlen($title)-1] = $last+1;
                
                return $this->checkUnique($title);
            }
            else{
                return $this->checkUnique($title.'2');
            }
            
        }
        
        return $url;
    }
    
    /**
     * Shortcut for database
     * @return Nette\Database\Context
     */
    private function newsDat(){
        
        return $this->database->table('news');
    }
}
