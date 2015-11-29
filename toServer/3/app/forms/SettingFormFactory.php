<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
        Nette\Security\User,
        App\Model\UserManager,
        Nette\Utils\Html;

class SettingFormFactory {           
    
        /** @var UserManager */
        private $userManager;
    
        /** @var User */
        private $user;
        
        public function __construct(UserManager $userManager, User $user){
            
            $this->userManager = $userManager;
            $this->user = $user->getIdentity();
        }

	/**
	 * @return Form
	 */
	public function create($otherUser = '', $privilegesEdit = false){
            
		$form = new Form;                		                                                 

                if(!empty($otherUser)){
                    
                    $user = $otherUser; 
                    $form->addHidden('id', $otherUser->id);
                }
                else{
                    $user = $this->user; 
                }

                $form->addUpload('photo', 'Fotka')                
                    ->addRule($form::MAX_FILE_SIZE, 'Maximální velikost fotky je 10MB', 80000000);
        
                $form->addText('nickName', 'Přihlašovací jméno')
                    ->setValue($user->nickName)
                    ->setOption('description', Html::el('p')
                            ->setHtml('Pokud chcete můžete pro jednodušší přihlašování zadat jméno'))
                    ->addCondition(Form::FILLED)
                    ->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 3);
                
                $form->addText('name', 'Jméno k zobrazení')
                    ->setValue($user->name);   
                
                if($privilegesEdit){
                    $form->addText('title', 'Titul')
                        ->setValue($user->title)
                            ->setOption('description', Html::el('p')
                            ->setHtml('Titul měnitelný administrátorem přidaný před jméno')); 
                }
        
                $date = $this->parseDateForm();
        
                $form->addSelect('day', 'Den narození', $date['days'])
                    ->setValue($date['day']);
        
                $form->addSelect('month', 'Měsíc narození', $date['months'])
                    ->setValue($date['month']);
        
                $form->addSelect('year', 'Rok narození', $date['years'])
                    ->setValue($date['year']);
        
         
                $form->addSelect('gender', 'Pohlaví', ['ma' => 'Muž',
                                                            'fe' => 'Žena',
                                                            'no' => 'Neuvedeno'])
                    ->setValue($user->gender);  
        
                $form->addCheckbox('wall', 'Povolit zeď')
                    ->setValue($user->wall == 1?true:false);
                
                $form->addCheckbox('mailList', 'Posílat od nás maily')
                    ->setValue($user->mailList == 1?true:false);
        
                $form->addTextArea('about', 'O mě')
                    ->setValue($user->about);    
                
                if($privilegesEdit){
                    $this->editPrivileges($form, $user->permissions);
                }
                
                $form->addSubmit('submit', 'Uložit');
        
                $form->addProtection('Vypršel časový limit, odešlete formulář znovu');
               
                $form->onSuccess[] = [$this, 'formSucceeded'];
                
                return $form;
	}
        
        private function editPrivileges(Form $form, $permissions){
            
            $priv = $form->addContainer('privileges');                       
            
            $priv->addCheckboxList('FastNews', 'Rychlé zprávy:', [
                'add' => 'Přidat',
                'moderate' => 'Upravovat, mazat všem'
            ]);
            
            $priv->addCheckboxList('NewActions', 'Nové akce: ', [
                'add' => 'Přidat',
                'moderate' => 'Upravovat, mazat všem'
            ]);
            
            $priv->addCheckboxList('Article', 'Články: ', [
                'add' => 'Napsat',
                'publish' => 'Publikovat',
                'moderate' => 'Upravovat, mazat všem'
            ]);
            
            $priv->addCheckboxList('Comments', 'Komentáře: ', [
                'addAsAdmin' => 'Přidávat jako admin',
                'moderate' => 'Upravovat, mazat'
            ]);
            
            $priv->addCheckboxList('User', 'Uživatele: ', [
                'add' => 'Přidávat neregistrované',
                'see' => 'Zobrazit seznam',                
                'prohibit' => 'Udělit BAN',
                'moderate' => 'Upravovat, mazat',               
            ]);
            
            $priv->addCheckboxList('ArtTeam', 'Art team: ', [
                'see' => 'Zobrazit kontaky na členy',
                'add' => 'Přidávat členy',                
                'moderate' => 'Upravovat, mazat jakékoliv členy'
            ]);
            
            $priv->addCheckboxList('MediaArchive', 'Media archiv: ', [
                'see' => 'Zobrazit media',
                'add' => 'Přidávat do media archivu',             
                'moderate' => 'Upravovat, mazat jakýkoliv obsah'
            ]);
            
            $priv->addCheckboxList('Section', 'Skece k článkům:', [
                'moderate' => 'upravovat'
            ]);

            $priv->setDefaults($this->parseRole($permissions));
        }
        
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
        
        /**
         * From form make string 
         * @param array $values
         * @return string
         */
        private function parsePrivileges($values){             
            
            $privArr = [];
            
            foreach($values as $privilege=>$allowed){
                
                $privArr[$privilege] = '';
                foreach($this->resourcesPrivilegesDefault[$privilege] as $allo=>$n){
                                       
                    if(in_array($allo, $values[$privilege])){
                        $privArr[$privilege] .= '1';
                    }else{
                        $privArr[$privilege] .= '0';
                    }
                    
                }
            }
            
            return implode('|', $privArr);
        }
        
    /**
     * Parse role to privileges
     * @param string $role
     */
    private function parseRole($role){       
        
        $privilegesList = [];
        
        $userResources = explode('|', $role);        
        
        $resourceCount = 0;
        
        foreach($this->resourcesPrivilegesDefault as $resource=>$privileges){                       
            
            $privilegeCount = 0;
            
            foreach($privileges as $privilege=>$value){
                
                if($userResources[$resourceCount][$privilegeCount]){
                    $privilegesList[$resource][] = $privilege;
                }
                
                $privilegeCount++;
            }
            $resourceCount++;
        }
        
        return $privilegesList;
    }
        
    /**
     * 
     * @return array
     */
        private function parseDateForm(){
            
            $month = array('00'=>'Neuvedeno','01'=>'Leden','02'=>'Únor','03'=>'Březen',
                '04'=>'Duben','05'=>'Květen','06'=>'Červen','07'=>'Červenec',
                '08'=>'Srpen','09'=>'Září','10'=>'Říjen','11'=>'Listopad',
                '12'=>'Prosinec');
                   
            for($i = 1900; $i <= date('Y'); $i++){
                $year[$i] = $i;
            }       
            $year['0000'] = 'Neuvedeno'; 
        
            for($i = 1; $i <= 31; $i++){
                
                if($i < 10){
                    $day['0'.$i] = '0'.$i;
                }
                else{
                    $day[$i] = $i;
                }              
            }       
            $day['00'] = 'Neuvedeno'; 
              
            $born = $this->user->born;
      
            if(!$born){
                return ['months' => $month, 'month' => '00',
                        'years' => $year, 'year' => '0000',
                        'days' => $day, 'day' => '00'];
            }
            else{ 
             $datab = explode('-', $born); 
                return ['months' => $month, 'month' => $datab[1],
                            'years' => $year, 'year' => $datab[0],
                            'days' => $day, 'day' => substr($datab[2], 0, 2)];
            }
        }
        
        /**
         * Date for database
         * @param string $year
         * @param string $month
         * @param string $day
         * @return boolean, string
         */
        private function parseDateDatabase($year, $month, $day){
            
            if($month == '02' && $day > 29){
                return false;
            }       
            elseif($month % 2 == 0 && $day > 30){
                return false;
            }
            else{
                return $year.'-'.$month.'-'.$day;
            }     
    }

    /**
     * Form OK
     * @param Form $form
     */
	public function formSucceeded(Form $form){
            
            $values = $form->getValues(TRUE);

            if(!$values['photo']->isImage() && $values['photo']->isOK()){
                $form->addError('Toto není obrázek');
            }
            
            else{           
                $date = $this->parseDateDatabase($values['year'], $values['month'], $values['day']); 
          
                if($date === false){
                    $form->addError('Takové datum neexistuje');
                }
                
                else{                    
                    $values['born'] = $date;
                    
                    try{        
                        
                        if(isset($values['privileges'])){
                            
                            $privileges = $this->parsePrivileges($values['privileges']);
                            unset($values['privileges']);
                            $values['permissions']=$privileges;
                        }
                        
                       $this->userManager->updateUser($values, isset($values['id'])?$values['id']:$this->user);
                        
                    } catch(\Exception $e){
            
                        $form->addError($e->getMessage());
                    }
                         
        
                }
            }
        }
}
