<?php

namespace App\Model;

use Nette,
        Nette\Mail\SendmailMailer,
        Nette\Mail\SmtpMailer,
        Nette\Mail\Message;

class SendMailManager extends Nette\Object{
    
    private $latte;
    
    const FROM = 'Ars poetica <arspoetica@post.cz>';
    
    public function __construct() {
       
        $this->latte = new \Latte\Engine;       
    }
    
    /**
     * Sends mail for new user
     * @param string $mail
     * @param string $checkCode
     */
    public function sendWelcomeMail($mail, $checkCode){
            
        $message = new Message;
        
        $message->setFrom(self::FROM)
                ->addTo($mail)
                ->setSubject('Registrace na webu Arspoetica.net')
                ->setHtmlBody($this->latte->renderToString(__DIR__.'/../mails/welcomeMail.latte', ['checkCode' => $checkCode]));
        
        $this->send($message);
    }
    
    /**
     * Sends form for new password
     * @param string $mail
     * @param string $data
     */
    public function sendNewPassword($mail, $name, $checkCode){
            
        $message = new Message;
        
        $message->setFrom(self::FROM)
                ->addTo($mail)
                ->setSubject('Ztracené heslo na webu Arspoetica.net')
                ->setHtmlBody($this->latte->renderToString(__DIR__.'/../mails/lostPassMail.latte', ['checkCode' => $checkCode, 'name' => $name]));
        
        $this->send($message);
    }
    
    /**
     * Sends form for new password
     * @param string $mail
     * @param string $data
     */
    public function sendNewMailCode($mail, $name, $checkCode, $logedable = true){
            
        $message = new Message;
        
        $message->setFrom(self::FROM)
                ->addTo($mail)
                ->setSubject('Nový mail k webu Arspoetica.net')
                ->setHtmlBody($this->latte->renderToString(__DIR__.'/../mails/newAddressMail.latte', ['checkCode' => $checkCode, 'name' => $name, 'logedable' => $logedable]));
        
        $this->send($message);
    }
    
    
    /**
     * Sends new mail
     * @param type $mail
     */
    private function send($mail){
        
       // $mailer = new SendmailMailer;
       // $mailer->send($mail);
        
        $mailer = new Nette\Mail\SmtpMailer(array(
            'host' => 'smtp.seznam.cz',
            'username' => 'arspoetica@post.cz',
            'password' => 'heslojeveslo9',
            'secure' => 'ssl',
        ));
        
        $mailer->send($mail);        
    }
}
