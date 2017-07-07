<?php
/* @var $this DsolicitanteprestamoController */
/* @var $data DsolicitantePrestamo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsolicitanteprestamo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idsolicitanteprestamo), array('view', 'id'=>$data->idsolicitanteprestamo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsolicitante')); ?>:</b>
	<?php echo CHtml::encode($data->idsolicitante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaautorizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fechaautorizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaentregaprestamo')); ?>:</b>
	<?php echo CHtml::encode($data->fechaentregaprestamo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valorprestamo')); ?>:</b>
	<?php echo CHtml::encode($data->valorprestamo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>