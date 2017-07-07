<?php
/* @var $this DcuotasprestamoController */
/* @var $model DcuotasPrestamo */

$this->breadcrumbs=array(
	'Dcuotas Prestamos'=>array('index'),
	$model->idcuotaprestamo=>array('view','id'=>$model->idcuotaprestamo),
	'Update',
);

$this->menu=array(
	array('label'=>'List DcuotasPrestamo', 'url'=>array('index')),
	array('label'=>'Create DcuotasPrestamo', 'url'=>array('create')),
	array('label'=>'View DcuotasPrestamo', 'url'=>array('view', 'id'=>$model->idcuotaprestamo)),
	array('label'=>'Manage DcuotasPrestamo', 'url'=>array('admin')),
);
?>

<h1>Update DcuotasPrestamo <?php echo $model->idcuotaprestamo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>