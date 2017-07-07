<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>

<div class="contenido container-fluid">
<div style="padding-left: 10%; padding-right: 10%;">
    <div class="form-group">
        <!--<center><img src="<?php // echo Yii::app()->baseUrl . '/images/logo_saime.png' ?>" class="img-responsive" alt="SAIME" /></center><br>-->
        <center><h5><b>INICIAR SESIÓN</b></h5></center>
        <?php
          $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        )); 
        ?>
        <?php //  echo $form->errorSummary($model); ?>
        <br>
        <div class="form-group col-lg-12">
            <?php // echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username', array("autocomplete" => "off", "class" => "form-control", "placeholder" => "Usuario",'maxlength' => 50,)); ?>
            <?php  echo $form->error($model,'username'); ?>
            <?php // echo $form->textField($model, 'username', array("autocomplete" => "off", "class" => "form-control", "placeholder" => "Dirección de Correo",'maxlength' => 50,)); ?>
        </div>
        
        <div class="form-group col-lg-12">
            <?php // echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password', array("class" => "form-control", "placeholder" => "Clave o Contraseña",'maxlength' => 20,)); ?>
            <?php  echo $form->error($model,'password'); ?>
            <?php // echo $form->passwordField($model, 'password', array("class" => "form-control", "placeholder" => "Clave o Contraseña",'maxlength' => 20,)); ?>
        </div>

        <div class="form-group col-lg-12">
            <?php echo CHtml::submitButton('Ingresar', array("class" => "btn btn-primary btn-block btn-lg")); ?>
        </div>
        <br><br>

        <?php $this->endWidget(); ?>
    </div>
   
</div>
</div>

<!--<script>
    $(index).removeClass('active');
    $(consultas).removeClass('active');
    $(usuarios).removeClass('active');
    $(login).addClass('active');
</script>-->


