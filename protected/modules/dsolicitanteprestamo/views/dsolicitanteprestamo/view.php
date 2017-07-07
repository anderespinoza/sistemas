<?php
Yii::import("application.models.Nestatus");
/* @var $this DsolicitanteprestamoController */
/* @var $model DsolicitantePrestamo */



//$this->menu=array(
//	array('label'=>'List DsolicitantePrestamo', 'url'=>array('index')),
//	array('label'=>'Create DsolicitantePrestamo', 'url'=>array('create')),
//	array('label'=>'Update DsolicitantePrestamo', 'url'=>array('update', 'id'=>$model->idsolicitanteprestamo)),
//	array('label'=>'Delete DsolicitantePrestamo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsolicitanteprestamo),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage DsolicitantePrestamo', 'url'=>array('admin')),
//);
//$cuotas = new DcuotasPrestamo();
//$v = $cuotas->search($model->idsolicitanteprestamo);
//print_r($v->estatus);exit;
?>


<h1>Cuotas del Prestamo Nro. <?php echo $model->idsolicitanteprestamo; ?></h1>
<?php
$cuotas = new DcuotasPrestamo();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dcuotas-prestamo-grid',
	'dataProvider'=>$cuotas->search($model->idsolicitanteprestamo),
	'filter'=>$cuotas,
	'columns'=>array(
		'idsolicitanteprestamo'=>array(
                    "name" => "Nro de Prestamo",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" => $model->idsolicitanteprestamo,
                    'filter'=>true,
                                 ),

		'numcuota'=>array(
                    "name" => "numcuota",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" => $cuotas->numcuota,
                    'filter'=>false,
                                 ),
		'valorcuota'=>array(
                    "name" => "valorcuota",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" => 'number_format($data->valorcuota,2,",",".")',
                    'filter'=>false,
                                 ),
		'fecha_cuota'=>array(
                    "name" => "fecha_cuota",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" => $cuotas->fecha_cuota,
                    'filter'=>false,
                                 ),
		'estatus'=>array(
                    "name" => "estatus",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" =>'$data->estatus0->descripcion',
                    'filter'=>false,
                                 ),
	
	),
)); 


function nombres($idsolicitante){
    $nombres = Dsolicitante::model()->find('idsolicitante ='.$idsolicitante);
    $nomape = $nombres->primernombre.' '.$nombres->primerapellido;
    return utf8_encode($nomape);
    
}

 ?>