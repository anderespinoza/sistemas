<?php
/* @var $this DsolicitanteController */
/* @var $model Dsolicitante */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idsolicitante'); ?>
		<?php echo $form->textField($model,'idsolicitante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'letra'); ?>
		<?php echo $form->textField($model,'letra',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primernombre'); ?>
		<?php echo $form->textField($model,'primernombre',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primerapellido'); ?>
		<?php echo $form->textField($model,'primerapellido',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'celular'); ?>
		<?php echo $form->textField($model,'celular'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->