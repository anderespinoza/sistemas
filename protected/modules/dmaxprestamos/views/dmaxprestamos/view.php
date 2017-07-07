<?php
/* @var $this DmaxprestamosController */
/* @var $model DmaxPrestamos */

$this->breadcrumbs=array(
	'Dmax Prestamoses'=>array('index'),
	$model->idmaxprestamo,
);

$this->menu=array(
	array('label'=>'List DmaxPrestamos', 'url'=>array('index')),
	array('label'=>'Create DmaxPrestamos', 'url'=>array('create')),
	array('label'=>'Update DmaxPrestamos', 'url'=>array('update', 'id'=>$model->idmaxprestamo)),
	array('label'=>'Delete DmaxPrestamos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmaxprestamo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DmaxPrestamos', 'url'=>array('admin')),
);
?>

<h1>View DmaxPrestamos #<?php echo $model->idmaxprestamo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmaxprestamo',
		'maxvalor',
	),
)); ?>
