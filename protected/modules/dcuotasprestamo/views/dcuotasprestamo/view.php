<?php
/* @var $this DcuotasprestamoController */
/* @var $model DcuotasPrestamo */

$this->breadcrumbs=array(
	'Dcuotas Prestamos'=>array('index'),
	$model->idcuotaprestamo,
);

$this->menu=array(
	array('label'=>'List DcuotasPrestamo', 'url'=>array('index')),
	array('label'=>'Create DcuotasPrestamo', 'url'=>array('create')),
	array('label'=>'Update DcuotasPrestamo', 'url'=>array('update', 'id'=>$model->idcuotaprestamo)),
	array('label'=>'Delete DcuotasPrestamo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcuotaprestamo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DcuotasPrestamo', 'url'=>array('admin')),
);
?>

<h1>View DcuotasPrestamo #<?php echo $model->idcuotaprestamo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcuotaprestamo',
		'idsolicitanteprestamo',
		'numcuota',
		'valorcuota',
		'fecha_cuota',
		'estatus',
	),
)); ?>
