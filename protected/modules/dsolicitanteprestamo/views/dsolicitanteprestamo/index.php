<?php
/* @var $this DsolicitanteprestamoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dsolicitante Prestamos',
);

$this->menu=array(
	array('label'=>'Create DsolicitantePrestamo', 'url'=>array('create')),
	array('label'=>'Manage DsolicitantePrestamo', 'url'=>array('admin')),
);
?>

<h1>Dsolicitante Prestamos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
