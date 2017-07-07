<?php
/* @var $this DmaxprestamosController */
/* @var $model DmaxPrestamos */

$this->breadcrumbs=array(
	'Dmax Prestamoses'=>array('index'),
	$model->idmaxprestamo=>array('view','id'=>$model->idmaxprestamo),
	'Update',
);

$this->menu=array(
	array('label'=>'List DmaxPrestamos', 'url'=>array('index')),
	array('label'=>'Create DmaxPrestamos', 'url'=>array('create')),
	array('label'=>'View DmaxPrestamos', 'url'=>array('view', 'id'=>$model->idmaxprestamo)),
	array('label'=>'Manage DmaxPrestamos', 'url'=>array('admin')),
);
?>

<h1>Update DmaxPrestamos <?php echo $model->idmaxprestamo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>