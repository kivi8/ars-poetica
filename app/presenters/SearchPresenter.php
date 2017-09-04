<?php

namespace App\Presenters;

use Nette,
        App\Model,
	App\Model\ArticleManager;

/*
 * Search presenter
 */

class SearchPresenter extends BasePresenter{
    
    /** @var ArticleManager @inject */
    public $article;
    
    public function renderDefault($search){
	
	$this->template->error = '';
	$this->template->result = ['aa'];
	
	if(strlen($search) < 3){
	    $this->template->error = 'Musíte zadat více než 3 znaky';
	}
	else{
	    $this->template->result = $this->article->search($search);
	}
	
	
    }
    
}
