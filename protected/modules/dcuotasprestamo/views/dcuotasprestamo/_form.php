<?php
/* @var $this DcuotasprestamoController */
/* @var $model DcuotasPrestamo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dcuotas-prestamo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idsolicitanteprestamo'); ?>
		<?php echo $form->textField($model,'idsolicitanteprestamo'); ?>
		<?php echo $form->error($model,'idsolicitanteprestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numcuota'); ?>
		<?php echo $form->textField($model,'numcuota'); ?>
		<?php echo $form->error($model,'numcuota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valorcuota'); ?>
		<?php echo $form->textField($model,'valorcuota',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'valorcuota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_cuota'); ?>
		<?php echo $form->textField($model,'fecha_cuota'); ?>
		<?php echo $form->error($model,'fecha_cuota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
		<?php echo $form->error($model,'estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->