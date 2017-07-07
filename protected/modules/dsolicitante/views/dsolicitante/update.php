<?php
/* @var $this DsolicitanteController */
/* @var $model Dsolicitante */

$this->breadcrumbs=array(
	'Dsolicitantes'=>array('index'),
	$model->idsolicitante=>array('view','id'=>$model->idsolicitante),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dsolicitante', 'url'=>array('index')),
	array('label'=>'Create Dsolicitante', 'url'=>array('create')),
	array('label'=>'View Dsolicitante', 'url'=>array('view', 'id'=>$model->idsolicitante)),
	array('label'=>'Manage Dsolicitante', 'url'=>array('admin')),
);
?>

<h1>Update Dsolicitante <?php echo $model->idsolicitante; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>