<?php
/* @var $this DusuarioController */
/* @var $model Dusuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idusuario'); ?>
		<?php echo $form->textField($model,'idusuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreusuario'); ?>
		<?php echo $form->textField($model,'nombreusuario',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clave'); ?>
		<?php echo $form->textField($model,'clave',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idsolicitante'); ?>
		<?php echo $form->textField($model,'idsolicitante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idtipousuario'); ?>
		<?php echo $form->textField($model,'idtipousuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idestatus'); ?>
		<?php echo $form->textField($model,'idestatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->