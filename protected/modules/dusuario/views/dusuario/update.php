<?php
/* @var $this DusuarioController */
/* @var $model Dusuario */

$this->breadcrumbs=array(
	'Dusuarios'=>array('index'),
	$model->idusuario=>array('view','id'=>$model->idusuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dusuario', 'url'=>array('index')),
	array('label'=>'Create Dusuario', 'url'=>array('create')),
	array('label'=>'View Dusuario', 'url'=>array('view', 'id'=>$model->idusuario)),
	array('label'=>'Manage Dusuario', 'url'=>array('admin')),
);
?>

<h1>Update Dusuario <?php echo $model->idusuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>