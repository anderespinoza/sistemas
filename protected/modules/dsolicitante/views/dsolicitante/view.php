<?php
/* @var $this DsolicitanteController */
/* @var $model Dsolicitante */

$this->breadcrumbs=array(
	'Dsolicitantes'=>array('index'),
	$model->idsolicitante,
);

$this->menu=array(
	array('label'=>'List Dsolicitante', 'url'=>array('index')),
	array('label'=>'Create Dsolicitante', 'url'=>array('create')),
	array('label'=>'Update Dsolicitante', 'url'=>array('update', 'id'=>$model->idsolicitante)),
	array('label'=>'Delete Dsolicitante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsolicitante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dsolicitante', 'url'=>array('admin')),
);
?>

<h1>View Dsolicitante #<?php echo $model->idsolicitante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idsolicitante',
		'letra',
		'cedula',
		'primernombre',
		'primerapellido',
		'telefono',
		'celular',
	),
)); ?>
