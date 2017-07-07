<?php
/* @var $this DcuotasprestamoController */
/* @var $model DcuotasPrestamo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcuotaprestamo'); ?>
		<?php echo $form->textField($model,'idcuotaprestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idsolicitanteprestamo'); ?>
		<?php echo $form->textField($model,'idsolicitanteprestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numcuota'); ?>
		<?php echo $form->textField($model,'numcuota'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valorcuota'); ?>
		<?php echo $form->textField($model,'valorcuota',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_cuota'); ?>
		<?php echo $form->textField($model,'fecha_cuota'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->