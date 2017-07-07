<?php
/* @var $this DusuarioController */
/* @var $data Dusuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idusuario), array('view', 'id'=>$data->idusuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreusuario')); ?>:</b>
	<?php echo CHtml::encode($data->nombreusuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clave')); ?>:</b>
	<?php echo CHtml::encode($data->clave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsolicitante')); ?>:</b>
	<?php echo CHtml::encode($data->idsolicitante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipousuario')); ?>:</b>
	<?php echo CHtml::encode($data->idtipousuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idestatus')); ?>:</b>
	<?php echo CHtml::encode($data->idestatus); ?>
	<br />


</div>