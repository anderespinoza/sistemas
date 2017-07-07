<?php
/* @var $this DusuarioController */
/* @var $model Dusuario */

$this->breadcrumbs=array(
	'Dusuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dusuario', 'url'=>array('index')),
	array('label'=>'Manage Dusuario', 'url'=>array('admin')),
);
?>

<h1>Create Dusuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>