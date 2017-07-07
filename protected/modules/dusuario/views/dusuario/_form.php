<?php
/* @var $this DusuarioController */
/* @var $model Dusuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dusuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreusuario'); ?>
		<?php echo $form->textField($model,'nombreusuario',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'nombreusuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave'); ?>
		<?php echo $form->textField($model,'clave',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'clave'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idsolicitante'); ?>
		<?php echo $form->textField($model,'idsolicitante'); ?>
		<?php echo $form->error($model,'idsolicitante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idtipousuario'); ?>
		<?php echo $form->textField($model,'idtipousuario'); ?>
		<?php echo $form->error($model,'idtipousuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idestatus'); ?>
		<?php echo $form->textField($model,'idestatus'); ?>
		<?php echo $form->error($model,'idestatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->