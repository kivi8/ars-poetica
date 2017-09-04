<?php

namespace App\Model;

use Nette,
        App\Helper\Helper,
        Nette\Utils\Strings,
        Nette\Utils\Random,
        Nette\Utils\Image;

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
    
    public function getNewWriters(){
        
       return $this->database->table('newWriter')->where('deleted != 1')->fetchAll();
    }
    
    public function delNewWriter($id){
        
        return $this->database->table('newWriter')->where('id', $id)->update(['deleted' => 1]);
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
    
    public function getSerialForSection($forSection){
	
	$data = [];
	
	foreach($this->serialDat()->where('underSection', $forSection)->fetchAll() as $key => $dat){
	    
	    $ao = $this->getSerialArticleOrder($dat->articleOrder);
	    $url = $this->articleDat()->where('id', $ao[0])->fetch();
	    
	    if(empty($url->url)){
		continue;
	    }
	    
	    $data[$key]['url'] = $url->url;
	    $data[$key]['name'] = $dat->name;
	    $data[$key]['description'] = $dat->name;        
	}
	
	
	return $data;
	
    }
    
    public function getSerialForSubSection($forSubSection){
	
	$data = [];
	
	foreach($this->serialDat()->where('underSubSection', $forSubSection)->fetchAll() as $key => $dat){
	    
	    $ao = $this->getSerialArticleOrder($dat->articleOrder);
	    $url = $this->articleDat()->where('id', $ao[0])->fetch();
	    
	    if(empty($url->url)){
		continue;
	    }
	    
	    $data[$key]['url'] = $url->url;
	    $data[$key]['name'] = $dat->name;
	    $data[$key]['description'] = $dat->name;        
	}
	
	
	return $data;
	
    }
    
    private function getSerialArticleOrder($articleOrder){
	
	return explode('|', $articleOrder);
    }
    
    public function getArticlesUnderSerial($articleOrder){
	
	$ao = $this->getSerialArticleOrder($articleOrder);
	
	return $this->articleDat()->where('id', $ao)
		->order('FIELD(id, ?)', $ao)
		->fetchAll();
	
    }


    private function changeSerialOrder($articleOrder, $articleId, $toPosition){
	
	$ao = $this->getSerialArticleOrder($articleOrder);
	
	if(count($ao) > $toPosition || !array_search($articleId, $ao)){
	    return $ao;
	}
	
	$ao[array_search($articleId, $ao)] = $ao[$toPosition];
	
	$ao[$toPosition] = $articleId;
	
	return implode('|', $ao);
    }
    
    private function delArticleFromSerial($articleId, $articleOrder){
	
	$ao = $this->getSerialArticleOrder($articleOrder);
	
	$key = array_search($articleId, $ao);
	unset($ao[$key]);
	
	return implode('|', $ao);
    }
    
    private function addArticleToSerial($articleId, $articleOrder){	
	
	if($articleOrder){
	    return $articleOrder.'|'.$articleId;
	}
	
	return $articleId;
    }

    private function checkSerialInOrder($articleId, $articleOrder){
	
	$ao = $this->getSerialArticleOrder($articleOrder);
	
	foreach($ao as $article){
	    if($article == $articleId){
		return true;
	    }
	}
	return false;
	
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
            'url' => $this->checkUnique($values->name, $subSection, true),
            'name' => $values->name,
            'description' => $values->description,
        ]);
    }    
    
    /**
     * Delete section with subsections or only subsection
     * @param id $id
     * @param string $subSection
     */
    public function deleteSection($id, $subSection = false, $serial = false){
        
	if($serial){	    
            $this->serialDat()->where('id', $id)->delete();
	}	
        elseif($subSection){
            $this->subSectionDat()->where('id', $id)->delete();
	    $this->serialDat()->where('underSubSection', $id)->delete();
        }
        else{
            $this->serialDat()->where('underSection', $id)->delete();
	    $this->subSectionDat()->where('underSection', $id)->delete();
            $this->sectionDat()->where('id', $id)->delete();
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
            'articleOrder' => '',
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
    
    public function getArticleByUser($user){
        
        return $this->articleDat()->where('byUser', $user)
                ->order('date DESC')
                ->fetchAll();       
    }
    
    public function viewForArticleUrl($url, Nette\Http\Session $session){
        
        $view = $session->getSection('view_article');
        
        if(!$view->seenPages){
            $view->seenPages = [];
        }
        
        if(in_array($url, $view->seenPages)){
            return false;
        }
        
        $view->seenPages[] = $url;
        
        return $this->articleDat()->where('url', $url)->update([
            'views' => new Nette\Database\SqlLiteral('views +1')
        ]);
    }
    
    /**
     * Get one article from database by url
     * @param string $url
     * @return array
     */
    public function getArticleUrl($url){

        return $this->articleDat()->where('url', $url)
                ->order('date DESC')
                ->fetch();
    }
    
    public function getArticleNotSubsection($section){
        
        return $this->articleDat()->where('underSection = ? AND deleted != 1 AND published = 1', $section->id)
                ->order('date DESC')
                ->fetchAll();
    }
    
    public function getArticleBySubSection($subSection){
        
        return $this->articleDat()->where('underSubSection = ? AND deleted != 1 AND published = 1', $subSection->id)
                ->order('date DESC')
                ->fetchAll();
    }
    
    
    public function getNewArticleList($paginator){
        
        return $this->articleDat()->where('deleted != 1 AND published = 1')
                ->order('date DESC')
                ->limit($paginator->getLength(), $paginator->getOffset())
                ->fetchAll();
    }
    
    public function getNewArticleListAdd(\Nette\Utils\Paginator $paginator){
        
        return $this->articleDat()->where('deleted != 1 AND published = 1')
                ->order('date DESC')
                ->limit($paginator->getLength())
                ->fetchAll();
    }
    
    public function countNewArticleList(){
        
        return $this->articleDat()->where('deleted != 1 AND published = 1')
                ->count();
    }
    
    public function getNotPublicArticleList($paginator){
        
        return $this->articleDat()->where('deleted != 1 AND published != 1')
                ->order('date DESC')
                ->limit($paginator->getLength(), $paginator->getOffset())
                ->fetchAll();
    }
    
    public function countNotPublicArticleList(){
        
        return $this->articleDat()->where('deleted != 1 AND published != 1')
                ->count();
    }
    
    public function getDeltedArticleList($paginator){
        
        return $this->articleDat()->where('deleted = 1')
                ->order('date DESC')
                ->limit($paginator->getLength(), $paginator->getOffset())
                ->fetchAll();
    }
    
    public function countDeletedArticleList(){
        
        return $this->articleDat()->where('deleted = 1')
                ->count();
    }
    
    public function publicNewWriter($id){
        
        $data = $this->database->table('newWriter')->where('id', $id)->fetch();
        
        if(!$data){
            return null;
        }
        
        $updateData = [
            'title' => $data->title?$data->title:'Nenastavený titulek',
            'text' => $data->text,
            'description' => $data->aboutUser,
            'keyWords' => '',
            'photo' => '',
            'commentsAllow' => 0,
            'voteAllow' => 0,
            'published' => 0,
            'underSection' => null,
            'underSubSection' => null,
            'underSerial' => null,
        ];
        
        if($data->byUser){
            $updateData['byUser'] = $data->byUser;
            $rId = $this->addArticle($data->byUser, \Nette\Utils\ArrayHash::from($updateData));        
        }
        else{
            $rId = $this->addArticle(null, \Nette\Utils\ArrayHash::from($updateData));
        }
        
        
        $this->delNewWriter($id);
        
        return $rId;
    }
    
    public function addArticle($userId, $values){
        
        $time = Helper::datTime();
        
        if(!empty($values->byUser) && $values->byUser != $userId){
            $byUser = $values->byUser;
        }
        elseif(empty($values->byUnregUser)){
            $byUser = $userId;
        }
        else{
            $byUser = null;
        }
        
        $photo = '';
        
        if($values->photo->isOK()){
                $photo = $this->genName($values->photo, $values->title);
                $this->savePhoto($photo);                
            }   
        
        $row = $this->articleDat()->insert([
            'byUser' => $byUser,
            'byUnregUser' => isset($values->byUnregUser) && $values->byUnregUser?$values->byUnregUser:null,
            'url' => $this->checkUnique($values->title, 'articleDat'),
            'title' => $values->title,
            'text' => $values->text,
            'description' => $values->description,
            'keyWords' => $values->keyWords,
            'photo' => !empty($photo)?$photo['name']:'',
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
	
	$articleId = $row->id;
	
	if($values->underSerial !== 0){
	    $serDat = $this->serialDat()->where('id', $values->underSerial)->fetch();
	    if(empty($serDat->articleOrder)){
		$this->serialDat()->where('id', $values->underSerial)->update(['articleOrder' => $articleId]);
	    }
	    if($serDat->articleOrder){
		$this->serialDat()->where('id', $values->underSerial)->update(['articleOrder' => $serDat->articleOrder.'|'.$articleId]);
	    }
	}
        
        return $articleId;
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
	    'description' => $values->description
        ];
        
        if(!empty($values->byUser) && empty($values->byUnregUser)){
            $data['byUser'] = $values->byUser;
            $data['byUnregUser'] = null;
        }
        
        if(!empty($values->byUnregUser)){
            $data['byUnregUser'] = $values->byUnregUser;
            $data['byUser'] = null;
        }
        
        if(isset($values->published)){
            $data['published'] = $values->published;
        }
        
        if(isset($values->deleted)){
            $data['deleted'] = $values->deleted;
        }
        
        
        if($values->photo->isOK()){
                $photo = $this->genName($values->photo, $values->title);
                $this->savePhoto($photo);     
                $data['photo'] = $photo['name'];
            }  
        
        $this->articleDat()->where('id', $values->id)->update($data);
	
	if($values->underSerial && $values->underSerial != $values->oldSerial){
	    
	    if($values->oldSerial){
		$oldAO = $this->serialDat()->where('id', $values->oldSerial)
		    ->fetch()->articleOrder;
	    
		$this->serialDat()->where('id', $values->oldSerial)
		    ->update(['articleOrder' => $this->delArticleFromSerial($values->id, $oldAO)]);
	    }
	    
	    
	    $newAO = $this->serialDat()->where('id', $values->underSerial)
		    ->fetch()->articleOrder;
	    
	    $this->serialDat()->where('id', $values->underSerial)
		    ->update(['articleOrder' => $this->addArticleToSerial($values->id, $newAO)]);
	}
    }
    
    public function search($search){
		
	return $this->articleDat()
		->where('title LIKE ?',"%$search%")
		->limit(50)
                ->fetchAll(); 
    }
    
    /**
         * Saves photo
         * @param string $name
         * @return type
         */
        private function savePhoto($name){
            
            $www = __DIR__.'/../../www/media/thumbnails/';

            $image1 = Image::fromFile($name['temp']); 	    	                        
            $image1->resize(900, 600, Image::FILL)->crop('50%', '50%', 900, 600);                     
            $image1->save($www.$name['name']); 
	    	    
	    $image2 = Image::fromFile($name['temp']); 
	    $image2->resize(450, 300, Image::FILL)->crop('50%', '50%', 450, 300);                       
            $image2->save($www.'sm-'.$name['name']); 
	    
	    
	    $image3 = Image::fromFile($name['temp']); 
	    $image3->resize(1200, 800, Image::FILL)->crop('50%', '50%', 1200, 800);                       
            $image3->save($www.'long-'.$name['name']); 
            
            return $name['name'];
        }       
        
        /**
         * Generates name for photo
         * @param string $photo
         * @param string $id
         * @return array
         */
        private function genName($photo, $id){  
            
            $www = __DIR__.'/../../www/media/thumbnails/';
            
            $ext = '.'.pathinfo($photo->getName(), PATHINFO_EXTENSION);
            $name = Strings::webalize($id).Random::generate(3).$ext;
            
            if(file_exists($www.$name)){
                return $this->genName($photo, $id);
            }
            else{
                return array('name' => $name, 'temp' => $photo->getTemporaryFile());
            }
            
        }
        
        /**
         * Deletes old photo from disk
         * @param type $photo
         */
        private function delOldPhoto($photo){
            
            $www = __DIR__.'/../../www/media/thumbnails/';
            
            if(file_exists($www.$photo)){
                unlink($www.$photo);
            }        
            
            
        }
    
     /**
     * Check if url is unique. If not add number
     * @param string $title
     * @return string
     */
    private function checkUnique($title, $database, $id = null, $update = false){
        
        $url = Strings::webalize($title);
        
        $da = $this->$database()->where('url = ?', $url);
        
	if($update && $da->count() < 2){
	    return;
	}
	$dat = $da->fetch();
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
