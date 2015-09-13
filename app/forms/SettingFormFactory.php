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
	public function create(){
            
		$form = new Form;                		             
        
                $user = $this->user;               
                
                $form->addUpload('photo', 'Fotka')                
                    ->addRule($form::MAX_FILE_SIZE, 'Maximální velikost fotky je 10MB', 80000000);
        
                $form->addText('nickName', 'Přihlašovací jméno')
                    ->setValue($user->nickName)
                    ->setOption('description', Html::el('p')
                            ->setHtml('Pokud chcete můžete pro jednodušší přihlašování zadat jméno'))
                    ->addCondition(Form::FILLED)
                    ->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 4);
                
                $form->addText('name', 'Jméno k zobrazení')
                    ->setValue($user->name);   
        
                $date = $this->parseDateForm();
        
                $form->addSelect('day', 'Den narození', $date['days'])
                    ->setValue($date['day']);
        
                $form->addSelect('month', 'Měsíc narození', $date['months'])
                    ->setValue($date['month']);
        
                $form->addSelect('year', 'Rok narození', $date['years'])
                    ->setValue($date['year']);
        
         
                $form->addSelect('gender', 'Pohlaví', array('ma' => 'Muž',
                                                            'fe' => 'Žena',
                                                            'no' => 'Neuvedeno'))
                    ->setValue($user->gender);  
        
                $form->addCheckbox('wall', 'Povolit zeď')
                    ->setValue($user->wall == 1?true:false);
                
                $form->addCheckbox('mailList', 'Posílat od nás maily')
                    ->setValue($user->mailList == 1?true:false);
        
                $form->addTextArea('about', 'O mě')
                    ->setValue($user->about);    
        
                $form->addSubmit('submit', 'Uložit');
        
                $form->addProtection('Vypršel časový limit, odešlete formulář znovu');
               
                $form->onSuccess[] = [$this, 'formSucceeded'];
                
                return $form;
	}

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
                return array('months' => $month, 'month' => '00',
                        'years' => $year, 'year' => '0000',
                        'days' => $day, 'day' => '00');
            }
            else{ 
             $datab = explode('-', $born); 
                return array('months' => $month, 'month' => $datab[1],
                            'years' => $year, 'year' => $datab[0],
                            'days' => $day, 'day' => substr($datab[2], 0, 2));
            }
        }
        
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

	public function formSucceeded($form){
            
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
            
                        $this->userManager->updateUser($values, $this->user);
            
                    } catch(\Exception $e){
            
                    $form->addError($e->getMessage());
                    }
                         
        
                }
            }
        }
}
