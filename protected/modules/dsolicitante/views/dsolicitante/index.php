<?php
/* @var $this DsolicitanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dsolicitantes',
);

$this->menu=array(
	array('label'=>'Create Dsolicitante', 'url'=>array('create')),
	array('label'=>'Manage Dsolicitante', 'url'=>array('admin')),
);
?>

<h1>Dsolicitantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
