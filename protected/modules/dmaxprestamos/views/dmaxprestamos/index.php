<?php
/* @var $this DmaxprestamosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dmax Prestamoses',
);

$this->menu=array(
	array('label'=>'Create DmaxPrestamos', 'url'=>array('create')),
	array('label'=>'Manage DmaxPrestamos', 'url'=>array('admin')),
);
?>

<h1>Dmax Prestamoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
