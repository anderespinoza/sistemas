<?php
/* @var $this DcuotasprestamoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dcuotas Prestamos',
);

$this->menu=array(
	array('label'=>'Create DcuotasPrestamo', 'url'=>array('create')),
	array('label'=>'Manage DcuotasPrestamo', 'url'=>array('admin')),
);
?>

<h1>Dcuotas Prestamos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
