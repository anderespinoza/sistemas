<?php
/* @var $this DsolicitanteprestamoController */
/* @var $model DsolicitantePrestamo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idsolicitanteprestamo'); ?>
		<?php echo $form->textField($model,'idsolicitanteprestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idsolicitante'); ?>
		<?php echo $form->textField($model,'idsolicitante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaautorizacion'); ?>
		<?php echo $form->textField($model,'fechaautorizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaentregaprestamo'); ?>
		<?php echo $form->textField($model,'fechaentregaprestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valorprestamo'); ?>
		<?php echo $form->textField($model,'valorprestamo'); ?>
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