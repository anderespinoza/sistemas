<?php
/* @var $this DsolicitanteController */
/* @var $data Dsolicitante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsolicitante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idsolicitante), array('view', 'id'=>$data->idsolicitante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('letra')); ?>:</b>
	<?php echo CHtml::encode($data->letra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::encode($data->cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primernombre')); ?>:</b>
	<?php echo CHtml::encode($data->primernombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerapellido')); ?>:</b>
	<?php echo CHtml::encode($data->primerapellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
	<?php echo CHtml::encode($data->celular); ?>
	<br />


</div>