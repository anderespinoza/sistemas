<?php

/**
 * JPhpMailer class file.
 *
 * @version alpha 2 (2010-6-3 16:42)
 * @author jerry2801 <jerry2801@gmail.com>
 * @required PHPMailer v5.1
 *
 * A typical usage of JPhpMailer is as follows:
 * <pre>
 * Yii::import('ext.phpmailer.JPhpMailer');
 * $mail=new JPhpMailer;
 * $mail->IsSMTP();
 * $mail->Host='smpt.163.com';
 * $mail->SMTPAuth=true;
 * $mail->Username='yourname@yourdomain';
 * $mail->Password='yourpassword';
 * $mail->SetFrom('name@yourdomain.com','First Last');
 * $mail->Subject='PHPMailer Test Subject via smtp, basic with authentication';
 * $mail->AltBody='To view the message, please use an HTML compatible email viewer!';
 * $mail->MsgHTML('<h1>JUST A TEST!</h1>');
 * $mail->AddAddress('whoto@otherdomain.com','John Doe');
 * $mail->Send();
 * </pre>
 */

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'class.phpmailer.php';

class JPhpMailer extends PHPMailer{
    
    public $mail;
    
    public function JPhpMailer(){
        $this->mail = new PHPMailer;
        $this->mail->IsSMTP();
        $this->mail->IsHTML(true);
        $this->mail->SMTPAuth = Yii::app()->params['SMTPAuth'];
        $this->mail->Host = Yii::app()->params['SMTPHost'];
        $this->mail->Port = Yii::app()->params['SMTPPort'];
        $this->mail->Username = Yii::app()->params['SMTPUsername'];
        $this->mail->Password = Yii::app()->params['SMTPPassword'];
        $this->mail->AltBody = 'Portal Institucional - SAIME';
        $this->mail->SetFrom( Yii::app()->params['SMTPUsername'] , 'SAIME' );
        if( Yii::app()->params['SMTPDebug']['on'] == true ){
            $this->mail->SMTPDebug = Yii::app()->params['SMTPDebug']['level'];
        }
        if( Yii::app()->params['SMTPSecure']['required'] == true ){
            $this->mail->SMTPSecure = Yii::app()->params['SMTPSecure']["type"];
        }
    }
}