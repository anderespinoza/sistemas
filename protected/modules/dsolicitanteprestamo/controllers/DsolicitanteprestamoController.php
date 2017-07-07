<?php
Yii::import("application.modules.dusuario.models.Dusuario");
Yii::import("application.modules.dmaxprestamos.models.DmaxPrestamos");
Yii::import("application.modules.dcuotasprestamo.models.DcuotasPrestamo");
Yii::import("application.modules.dsolicitante.models.Dsolicitante");
Yii::import("application.models.Nestatus");
YII::import("application.controllers.SiteController");

class DsolicitanteprestamoController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','adminuser','estadistica'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array(),
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
		$model=new DsolicitantePrestamo();
                $cuotasprestamo = new DcuotasPrestamo();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['DsolicitantePrestamo']))
		{
			$model->attributes=$_POST['DsolicitantePrestamo'];
                        
                        if($model->validate(array('valorprestamo'))){
                            $model->cuota = $model->valorprestamo / 6;
                            $usuario = Yii::app()->user->getState('usuario');
                            $montoprestamoasignado = DsolicitantePrestamo::model()->findall('idsolicitante ='.$usuario->idsolicitante);
                            $totalmonto = 0;
                                for($n = 0; $n<=count($montoprestamoasignado)-1; $n++){
                                   $totalmonto = $totalmonto + $montoprestamoasignado[$n]->valorprestamo; 
                                }
                                $totalmonto = $totalmonto + $model->valorprestamo;
                                $criteria = new CDbCriteria;
                                $criteria->select='*';
                                $criteria->order='idmaxprestamo DESC';
                                $criteria->limit='1';
                                $montomax = DmaxPrestamos::model()->find($criteria);
                                $model->fecharegistro = date('Y-m-d');

                                
                        if(isset($_POST['DcuotasPrestamo']['valorcuota'])){
                            if($totalmonto < $montomax->maxvalor){
                            $model->estatus = 5; //en proceso
                            $model->idsolicitante = $usuario->idsolicitante;
			if($model->save())
                        {
                        Yii::app()->user->setFlash('mensaje', 'Su prestamo ha sido registrado exitosamente');
                        $this->redirect(array('create'));
                        
                        }
                        }else{
                                   unset($model->cuota);
                                   Yii::app()->user->setFlash('mensaje', 'El Monto Solicitado junto con los ya asignados exceden el valor máximo para prestamos en nuestro sistema');
                               }
                        }
                               
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'cuotasprestamo' =>$cuotasprestamo
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

		if(isset($_POST['DsolicitantePrestamo']))
		{
			$model->attributes=$_POST['DsolicitantePrestamo'];
                        
                        
                        if(date('d') <= 20){
                                    
                                    $verificarprestamo= DsolicitantePrestamo::model()->find('idsolicitanteprestamo ='.$model->idsolicitanteprestamo);
                                    $usuario = Dsolicitante::model()->find('idsolicitante ='.$model->idsolicitante);
                                    if($model->estatus != $verificarprestamo->estatus){
                                    if($model->save()){
                                        if($model->estatus == 6){ //6 prestamo aprobado
                                        $fecha =date('Y-m-d');
                                        $model->fechaautorizacion = $fecha;
                                        $model->fechaentregaprestamo = strtotime ( '+7 day' , strtotime ( $fecha ) ) ;
                                        $model->fechaentregaprestamo = date ( 'Y-m-d' , $model->fechaentregaprestamo );
                                        $model->isNewRecord = false;    
                                        $valorculota = $model->valorprestamo / 6;
                                        $cuotas = new DcuotasPrestamo();
                                        $cuotas->valorcuota =$valorculota;
                                        $cuotas->fecha_cuota = $fecha;
                                            for($i = 1; $i<=6; $i++){  

                                            $cuotas->idsolicitanteprestamo = $model->idsolicitanteprestamo;    
                                            $cuotas->numcuota = $i;
                                            $cuotas->fecha_cuota = strtotime ( '+30 day' , strtotime ( $cuotas->fecha_cuota ) ) ;
                                            $cuotas->fecha_cuota = date ( 'Y-m-d' , $cuotas->fecha_cuota );
                                            $cuotas->estatus =2; 
                                            $cuotas->IsNewRecord=true;
                                            $cuotas->save();
                                            $cuotas->idcuotaprestamo =null;
                                            }
                                            SiteController::EnviarEmail(
                                            Yii::app()->correo->aprobadoPrestamo($model), strtolower($usuario->correo));
                                        }
                                        if($model->estatus == 7){ // prestamo rechazado
                                            Yii::app()->user->setFlash('mensaje', 'Se registro se ha Actualizado con Éxito');
                                            SiteController::EnviarEmail(
                                            Yii::app()->correo->rechazadoPrestamo($model), strtolower($usuario->correo));
                                        }
                                    }
                                
                                Yii::app()->user->setFlash('mensaje', 'Se registro se ha Actualizado con Éxito');
                                
//				$this->redirect(array('view','id'=>$model->idsolicitanteprestamo));
                            
                            }else{
                                Yii::app()->user->setFlash('mensaje', 'El prestamo ya ha sido Aprobado '.$model->estatus0->descripcion);
                            }
                        }else{
                            Yii::app()->user->setFlash('mensaje', 'la Fecha Para Actualizar los prestamos ya Pasó');
                        }
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
		$dataProvider=new CActiveDataProvider('DsolicitantePrestamo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DsolicitantePrestamo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DsolicitantePrestamo']))
			$model->attributes=$_GET['DsolicitantePrestamo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        public function actionEstadistica()
	{
            
		$model = new DsolicitantePrestamo();
                if(isset($_POST['DsolicitantePrestamo'])){
                    $model->mes=$_POST['DsolicitantePrestamo']['mes'];
                    $model->year=$_POST['DsolicitantePrestamo']['year'];
                $model->scenario='reporte';
                if($model->validate(array('mes','year'))){
                $datos['aprobado'] = 0;
                $datos['rechazado'] = 0;
                $datos['pendiente'] = 0;
                
                $consulta = DsolicitantePrestamo::model()->findAll();
                for($i = 0; $i<=count($consulta)-1; $i++){
                    $fecha = explode('-',$consulta[$i]->fecharegistro); 
                    if($fecha[0] == $_POST['DsolicitantePrestamo']['year'] && $fecha[1] == $_POST['DsolicitantePrestamo']['mes'] && $consulta[$i]->estatus == 6)
                        {
                        $datos['aprobado'] = $datos['aprobado'] + 1;
                    }
                    if($fecha[0] == $_POST['DsolicitantePrestamo']['year'] && $fecha[1] == $_POST['DsolicitantePrestamo']['mes'] && $consulta[$i]->estatus == 5)
                        {
                        $datos['pendiente'] = $datos['pendiente'] + 1;
                    }
                    if($fecha[0] == $_POST['DsolicitantePrestamo']['year'] && $fecha[1] == $_POST['DsolicitantePrestamo']['mes'] && $consulta[$i]->estatus == 7)
                        {
                        $datos['rechazado'] = $datos['rechazado'] + 1;
                    }
                    $this->render('estadistica',array(
			'model'=>$model,
                        'datos'=>$datos,
		));
                    
                }               
                    
                }}else{
		$this->render('estadistica',array(
			'model'=>$model,
                ));
                
                }
	}
        
        public function actionAdminUser()
	{
		$model=new DsolicitantePrestamo('searchdos');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DsolicitantePrestamo']))
			$model->attributes=$_GET['DsolicitantePrestamo'];

		$this->render('adminuser',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DsolicitantePrestamo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DsolicitantePrestamo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DsolicitantePrestamo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dsolicitante-prestamo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
