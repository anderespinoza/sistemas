<?php
Yii::import("application.modules.dusuario.models.Dusuario");
YII::import("application.controllers.SiteController");

class DsolicitanteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Dsolicitante;
                $usuario = new Dusuario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dsolicitante']))
		{
			$model->attributes=$_POST['Dsolicitante'];
                        $usuario->attributes=$_POST['Dusuario'];
                        
                        if($model->validate() && $usuario->validate()){
                            $buscacedreg = Dsolicitante::model()->find('cedula = '.$model->cedula);
                            if(!isset($buscacedreg->idsolicitante)){
                                $buscanomusuario = Dusuario::model()->find('nombreusuario ="'.$usuario->nombreusuario.'" ');
                                if(!isset($buscanomusuario->idusuario)){
                                if($model->save()){
                            $usuario->idsolicitante = $model->idsolicitante;
                            $usuario->idtipousuario = 2;    //tipos de usuario 1 = administrador 2 = solicitnate de prestamo
                            $usuario->idestatus = 3; //tipos de estatus 1 = cancelado 2=sin cancelar 3=activo 4=no activo
                            if($usuario->save()){
                                SiteController::EnviarEmail(
                                Yii::app()->correo->registroUsuario($usuario), strtolower($model->correo));
                                Yii::app()->user->setFlash('mensaje', 'Sus datos han sido registrado con Éxito.');
				$this->redirect(Yii::app()->user->returnUrl);
                            }
                                }
                        }
                        else{
                            Yii::app()->user->setFlash('mensaje', 'EL NOMBRE DE USUARIO '.$usuario->nombreusuario.' NO ESTÁ DISPONIBLE');
                        }
                        }else{
                            Yii::app()->user->setFlash('mensaje', 'LA PERSONA DE LA C.I '.$model->cedula.' YA FUE REGISTRADO');
                        }
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'usuario'=>$usuario,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dsolicitante']))
		{
			$model->attributes=$_POST['Dsolicitante'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idsolicitante));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Dsolicitante');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dsolicitante('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dsolicitante']))
			$model->attributes=$_GET['Dsolicitante'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Dsolicitante the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Dsolicitante::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Dsolicitante $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dsolicitante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
