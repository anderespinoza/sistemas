<?php
/* @var $this DcuotasprestamoController */
/* @var $model DcuotasPrestamo */

$this->breadcrumbs=array(
	'Dcuotas Prestamos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DcuotasPrestamo', 'url'=>array('index')),
	array('label'=>'Manage DcuotasPrestamo', 'url'=>array('admin')),
);
?>

<h1>Create DcuotasPrestamo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>