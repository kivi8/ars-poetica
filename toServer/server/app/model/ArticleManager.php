<?php

namespace App\Model;

use Nette,
        App\Helper\Helper,
        Nette\Utils\Strings;

class ArticleManager extends Manager{
    
    /**
     * Add new potencial writer to database
     * @param array $form
     */
    public function addNewWriter($form){
        
        $this->database->table('newWriter')->insert([
            'contact' => $form->contact,
            'aboutUser' => $form->aboutUser,
            'title' => $form->title,
            'text' => $form->text,
            'date' => Helper::datTime(),
            'byUser' => $form->byUser
                ]);
    }
    
    /**
     * Get section and subsection list
     * @return type
     */
    public function getSectionList(){
        
        return $this->sectionDat()->order('itemOrder')->fetchAll();
    }
    
    public function getMainSectionList(){
        
        return $this->sectionDat()->order('itemOrder')
                ->fetchPairs('id', 'name');
    }
    
    public function getSubSectionList($forSec){
        
        return $this->subSectionDat()->where('underSection', $forSec)
                ->order('itemOrder')
                ->fetchPairs('id', 'name');
    }
    
    public function getSubSectionFor($section){
        
        return $this->subSectionDat()->where('underSection', $section)
                ->order('itemOrder');
    }
    
    /**
     * Returns list of serials for user
     * @param type $forSub
     * @param type $userId
     * @return type
     */
    public function getSerialList($forSub, $userId = false){
        
        if($userId){
            
            return $this->serialDat()
                ->where('underSubSection = ? AND byUser = ?', $forSub, $userId)
                ->fetchPairs('id', 'name');
        }
        
        return $this->serialDat()
                ->where('underSubSection = ?', $forSub)
                ->fetchPairs('id', 'name');
    }
    
    /**
     * Add section to database
     * @param type $values
     */
    public function addSection($values){
           
        $order = $this->sectionDat()->max('itemOrder');
        
        $values->description = isset($values->description)?$values->description:'';
        
        return $this->sectionDat()->insert([
            'url' => $this->checkUnique($values->name, 'sectionDat'),
            'name' => $values->name,
            'description' => $values->description,
            'itemOrder' => $order?$order+1:1
        ])->id;
    }
    
    /**
     * Get one section
     * @param int $id
     * @param string $subSection
     * @return Nette\Database\Context
     */
    public function getSection($id, $subSection = 'sectionDat'){
        
        return $this->$subSection()->where('id', $id)->fetch();
    }
    
    public function getSectionByUrl($url, $what = 'sectionDat'){
        
        return $this->$what()->where('url', $url)->fetch();
    }
    
    /**
     * Change values in section or subsection
     * @param array $values
     * @param string $subSection
     */
    public function updateSection($values, $subSection = 'sectionDat'){
        
        $this->$subSection()->where('id', $values->id)->update([
            'url' => $this->checkUnique($values->name, $subSection),
            'name' => $values->name,
            'description' => $values->description,
        ]);
    }    
    
    /**
     * Delete section with subsections or only subsection
     * @param id $id
     * @param string $subSection
     */
    public function deleteSection($id, $subSection = 'sectionDat'){
        
        if($subSection =='sectionDat'){
            $this->subSectionDat()->where('underSection', $id)->delete();
            $this->sectionDat()->where('id', $id)->delete();
        }
        else{
            $this->subSectionDat()->where('id', $id)->delete();
        }
    }
    
    /**
     * Add subsection
     * @param array $values
     * @return array
     */
    public function addSubSection($values){
        
        $order = $this->subSectionDat()->where('underSection', $values->underSection)->max('itemOrder');
        
        $values->description = isset($values->description)?$values->description:'';
        
        return $this->subSectionDat()->insert([
            'url' => $this->checkUnique($values->name, 'subSectionDat'),
            'name' => $values->name,
            'description' => $values->description,
            'underSection' => $values->underSection,
            'itemOrder' => $order?$order+1:1
        ])->id;
    }
    
    /**
     * addSerial
     * @param array $values
     * @return array
     */
    public function addSerial($values){
        
        $values->description = isset($values->description)?$values->description:'';
        
        return $this->serialDat()->insert([
            'url' => $this->checkUnique($values->name, 'serialDat'),
            'name' => $values->name,
            'description' => $values->description,
            'byUser' => $values->byUser,
            'articleOrder' => $values->articleId,
            'underSection' => $values->underSection,
            'underSubSection' => $values->underSubSection
        ])->id;
    }
    
    public function updateSerial($values){
        
        $articleOrder = explode('|', $this->serialDat()->where($values->id)
                            ->fetch()->articleOrder);
        
        $this->serialDat()->where($values->id)->update([
            
        ]);
    }
    
    /**
     * Change order of section in database
     * @param int $id
     * @param int $newOrder
     * @param string $sub
     */
    public function changeOrder($id, $newOrder, $sub){
        
        if($sub){
            
            $oldOrder = $this->subSectionDat()->where('id', $id)->fetch()->itemOrder;            
            $this->subSectionDat()->where('itemOrder', $newOrder)->update(['itemOrder' => $oldOrder]);
            $this->subSectionDat()->where('id', $id)->update(['itemOrder' => $newOrder]);
        }else{
            
            $oldOrder = $this->sectionDat()->where('id', $id)->fetch()->itemOrder;           
            $this->sectionDat()->where('itemOrder', $newOrder)->update(['itemOrder' => $oldOrder]);
            $this->sectionDat()->where('id', $id)->update(['itemOrder' => $newOrder]);
        }
        
    }

    
    /**
     * Get one article from database
     * @param int $id
     * @return arrayHash
     */
    public function getArticle($id){

        return $this->articleDat()->where('id', $id)->fetch();
    }
    
    /**
     * Get one article from database by url
     * @param string $url
     * @return array
     */
    public function getArticleUrl($url){

        return $this->articleDat()->where('url', $url)->fetch();
    }
    
    public function getArticleNotSubsection($section){
        
        return $this->articleDat()->where('underSection = ? AND deleted != 1  AND underSubSection IS NULL', $section->id)->fetchAll();
    }
    
    public function getArticleBySubSection($subSection){
        
        return $this->articleDat()->where('underSubSection = ? AND deleted != 1', $subSection->id)->fetchAll();
    }
    
    
    public function getNewArticleList(){
        
        return $this->articleDat()->where('deleted != 1')
                ->order('date DESC')
                ->limit(10)
                ->fetchAll();
    }
    
    public function addArticle($userId, $values){
        
        $time = Helper::datTime();
        
        $row = $this->articleDat()->insert([
            'byUser' => $userId,
            'url' => $this->checkUnique($values->title, 'articleDat'),
            'title' => $values->title,
            'text' => $values->text,
            'description' => $values->description,
            'keyWords' => $values->keyWords,
            'photo' => $values->photo,
            'underSection' => $values->underSection === 0?null:$values->underSection,
            'underSubSection' => $values->underSubSection === 0?null:$values->underSubSection,
            'underSerial' => $values->underSerial === 0?null:$values->underSerial,
            'date' => $time,
            'lastChange' => $time,
            'commentsAllow' => $values->commentsAllow,
            'voteAllow' => $values->voteAllow,
            'views' => 0,
            'published' => isset($values->published)?$values->published:0,
            'deleted' => 0
        ]);
        
        return $row->id;
    }
    
    public function updateArticle($values){
        
        $data = [
            'url' => $this->checkUnique($values->title, 'articleDat', $values->id),
            'title' => $values->title,
            'text' => $values->text,
            'keyWords' => $values->keyWords,
            'underSection' => $values->underSection === 0?null:$values->underSection,
            'underSubSection' => $values->underSubSection === 0?null:$values->underSubSection,
            'underSerial' => $values->underSerial === 0?null:$values->underSerial,
            'lastChange' => Helper::datTime(),
            'commentsAllow' => $values->commentsAllow,
            'voteAllow' => $values->voteAllow,
        ];
        
        if(isset($values->published)){
            $data['published'] = $values->published;
        }
        
        if(isset($values->deleted)){
            $data['deleted'] = $values->deleted;
        }
        
        $this->articleDat()->where('id', $values->id)->update($data);
    }
     /**
     * Check if url is unique. If not add number
     * @param string $title
     * @return string
     */
    private function checkUnique($title, $database, $id = null){
        
        $url = Strings::webalize($title);
        
        $dat = $this->$database()->where('url = ?', $url)->fetch();
        
        if($dat){
            
            if($id == $dat->id){
                return $url;
            }
            
            $last = $dat->url[strlen($dat->url)-1];
                      
            if(is_numeric($last)){
                
                $title[strlen($title)-1] = $last+1;
                
                return $this->checkUnique($title, $database);
            }
            else{
                return $this->checkUnique($title.'2', $database);
            }
            
        }
        
        return $url;
    }
    
    /**
     * Shortcut for database
     * @return Nette\Database\Context
     */
    private function articleDat(){
        return $this->database->table('article');
    }
    
    /**
     * Shortcut for database
     * @return Nette\Database\Context
     */
    private function sectionDat(){
        return $this->database->table('section');
    }
    
    /**
     * Shortcut for database
     * @return Nette\Database\Context
     */
    private function subSectionDat(){
        return $this->database->table('subSection');
    }
    
    /**
     * Shortcut for database
     * @return Nette\Database\Context
     */
    private function serialDat(){
        return $this->database->table('serial');
    }
    
}
