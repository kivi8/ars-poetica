<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{   
    
    public function renderDefault(){
        $get = $this->getRequest()->parameters;
            
        if(isset($get['log']) && $get['log'] == 'in' && !$this->session->started){
                
            $this->template->customFlashMessage = 'Nemáte zapnuté soubory cookies, pro přihlášení musí být povoleny.';
        }        
    }
}
