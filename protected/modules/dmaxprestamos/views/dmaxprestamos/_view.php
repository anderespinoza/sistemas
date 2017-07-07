<?php
/* @var $this DmaxprestamosController */
/* @var $data DmaxPrestamos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmaxprestamo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmaxprestamo), array('view', 'id'=>$data->idmaxprestamo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maxvalor')); ?>:</b>
	<?php echo CHtml::encode($data->maxvalor); ?>
	<br />


</div>