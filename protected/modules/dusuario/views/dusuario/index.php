<?php
/* @var $this DusuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dusuarios',
);

$this->menu=array(
	array('label'=>'Create Dusuario', 'url'=>array('create')),
	array('label'=>'Manage Dusuario', 'url'=>array('admin')),
);
?>

<h1>Dusuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
