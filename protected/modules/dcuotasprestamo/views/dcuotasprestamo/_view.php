<?php
/* @var $this DcuotasprestamoController */
/* @var $data DcuotasPrestamo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcuotaprestamo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcuotaprestamo), array('view', 'id'=>$data->idcuotaprestamo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsolicitanteprestamo')); ?>:</b>
	<?php echo CHtml::encode($data->idsolicitanteprestamo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numcuota')); ?>:</b>
	<?php echo CHtml::encode($data->numcuota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valorcuota')); ?>:</b>
	<?php echo CHtml::encode($data->valorcuota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_cuota')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_cuota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>