<?php
/* @var $this DusuarioController */
/* @var $model Dusuario */

$this->breadcrumbs=array(
	'Dusuarios'=>array('index'),
	$model->idusuario,
);

$this->menu=array(
	array('label'=>'List Dusuario', 'url'=>array('index')),
	array('label'=>'Create Dusuario', 'url'=>array('create')),
	array('label'=>'Update Dusuario', 'url'=>array('update', 'id'=>$model->idusuario)),
	array('label'=>'Delete Dusuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idusuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dusuario', 'url'=>array('admin')),
);
?>

<h1>View Dusuario #<?php echo $model->idusuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idusuario',
		'nombreusuario',
		'clave',
		'idsolicitante',
		'idtipousuario',
		'idestatus',
	),
)); ?>
