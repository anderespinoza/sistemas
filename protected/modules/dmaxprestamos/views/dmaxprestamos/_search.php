<?php
/* @var $this DmaxprestamosController */
/* @var $model DmaxPrestamos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idmaxprestamo'); ?>
		<?php echo $form->textField($model,'idmaxprestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maxvalor'); ?>
		<?php echo $form->textField($model,'maxvalor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->