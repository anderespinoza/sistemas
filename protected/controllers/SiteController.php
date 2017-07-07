<?php
Yii::import("application.modules.dusuario.models.Dusuario");
Yii::import('application.messages.messages');
Yii::import('application.messages.validator');

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
               // $validator = $this->actionValidarCampos($tiporeporte,$tipocertificado, $desde, $hasta);
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
                         $username = $_POST['LoginForm']['username'];
                    $password =$_POST['LoginForm']['password'];
                        $validator = $this->actionValidarCampos($username,$password);
                        if($validator == 1 && $model->login()){
			// validate user input and redirect to the previous page if valid
//			if($model->validate() && $model->login())
				$this->redirect($this->redirect('index.php?r=site/index'));
                        }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        
        public function EnviarEmail($message, $correo,  $atch = "", $nameAtch = ""){
        
            Yii::import('application.extensions.phpmailer.JPhpMailer');
            $mail = new JPhpMailer;
            $mail->IsSMTP();
            $mail->Host = Yii::app()->params['SMTPHost'];
            $mail->Port = Yii::app()->params['SMTPPort'];
            $mail->Username = Yii::app()->params['SMTPUsername'];
            $mail->Password = Yii::app()->params['SMTPPassword'];
            $mail->SetFrom(Yii::app()->params['SMTPUsername'], 'Prestamo');
            $mail->Subject = 'Prestamos';
            $mail->AltBody = 'Estimado Usuario';
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->MsgHTML($message);
            $mail->AddAddress($correo, 'Estimado Ciudadano');
            if( isset($alt) && $alt !== "" ){
                $mail->AddAddress($alt, 'Estimado Ciudadano');
            }
            if( $atch !== "" ){
                $mail->AddAttachment($atch, $nameAtch);
            }
            $result = $mail->Send();            
            return $result;            
        }
         public function actionValidarCampos($username,$password) {
        
        if (validator::isEmpty($username)) {
            Yii::app()->user->setFlash('mensaje', messages::ReqComSayUsername);
            return false;
            }
        if (validator::isEmpty($password)) {
            Yii::app()->user->setFlash('mensaje', messages::ReqComSayPassword);
            return false;
            }
        
        
               
        return true;
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}