<?php

namespace App\AdminModule\Presenters;

use Nette,
        App\Model\NewsManager,
        Nette\Utils\Paginator,
        App\Forms\FastNewsAddForm;

class NewsPresenter extends BasePresenter{
    
    const RES = 'FastNews';
    
    /** @var NewsManager @inject */
    public $newsManager;   
    
    /** @var Paginator */
    private $paginator;
    
    /** @var Paginator */
    private $paginatorDel;
    
    /** @var bool */
    private $moderate;
    
    public function actionDefault(){
        
        $this->moderate = $this->user->isAllowed(self::RES, 'moderate');
        
        if(!$this->moderate && !$this->user->isAllowed(self::RES, 'add')){
            throw new Nette\Application\ForbiddenRequestException;
        }
        
        $this->paginator = new Paginator;              
        $this->paginator->setItemCount($this->newsManager->getNewsCount(false, $this->moderate?false:$this->user->getId()));
        $this->paginator->setItemsPerPage(5);
        
        $this->paginatorDel = new Paginator;
        $this->paginatorDel->setItemCount($this->newsManager->getNewsCount(true, $this->moderate?false:$this->user->getId()));
        $this->paginatorDel->setItemsPerPage(5);
    }      
    
    public function renderDefault(){
       
       
       $this->template->paginator = $this->paginator;
       $this->template->paginatorDel = $this->paginatorDel;       
       
       if($this->moderate){
           $this->template->news = $this->newsManager->getNewsList($this->paginator->getLength(), $this->paginator->getOffset(), 0);
           $this->template->newsDel = $this->newsManager->getNewsList($this->paginatorDel->getLength(), $this->paginatorDel->getOffset(), 1);
       }
       else{
           $this->template->news = $this->newsManager->getNewsList($this->paginator->getLength(), $this->paginator->getOffset(), 0, $this->user->getId());
        $this->template->newsDel = $this->newsManager->getNewsList($this->paginatorDel->getLength(), $this->paginatorDel->getOffset(), 1, $this->user->getId());
       }
    }
    
    public function handlePage($page = '', $for = 'pub'){
        
        if(!$page){
            throw new \Nette\Application\BadRequestException;
        }
        
        if($for == 'pub'){
            $this->paginator->setPage($page);
        }
        else{
            $this->paginatorDel->setPage($page);
        }
        $this->redrawAjax('pubNews');
        $this->redrawAjax('delNews');
    }
    
    private $newsData;
    
    public function actionModerate($id = ''){
        
        if(!$id){
            throw new \Nette\Application\BadRequestException;
        }
        
        if(!$this->userCan($id)){
            throw new \Nette\Application\ForbiddenRequestException;
        }
                
        $this->newsData = $this->newsManager->getOneNews($id, true)[0];
        
        if(!$this->newsData){
            throw new \Nette\Application\BadRequestException;
        }
    }
    
    public function renderModerate(){
        
        $this->template->news = $this->newsData;
    }
    
    protected function createComponentEditNewsForm(){
        
        $form = (new FastNewsAddForm())->create();
               
        $form->addCheckbox('deleted', 'Nepublikovaný');
        
        $form->setValues($this->newsData);
        
        $form->onSuccess[] = [$this, 'newsFormSucceeded'];
        
        return $form;
    }
    
    public function newsFormSucceeded($form, $values){

        $this->newsManager->updateNews($values, $this->newsData->id);
        $this->redirect('News:');
    }
    
    protected function createComponentAddNewsForm(){
        
        $form = (new FastNewsAddForm())->create();
        $form->onSuccess[] = [$this, 'addFormSucceeded'];
        return $form;
    }
    
    public function addFormSucceeded($form, $values){
        
        $this->newsManager->addNews($values, $this->user->id);           
        
        $this->redirect('this');
    }
    
    public function userCan($id){
        
        return $this->resourceAuthorizator->canUse(self::RES, $id);
    }
    
}
