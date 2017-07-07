<?php
/* @var $this DsolicitanteprestamoController */
/* @var $model DsolicitantePrestamo */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dsolicitante-prestamo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Consulta de Prestamos</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dsolicitante-prestamo-grid',
	'dataProvider'=>$model->searchdos(),
	'filter'=>$model,
	'columns'=>array(
		'idsolicitanteprestamo'=>array(
                    "name" => "Nro de Prestamo",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" => '$data->idsolicitanteprestamo',
                    'filter'=>true,
                                 ),
		'idsolicitante'=>array(
                    "name" => "Nombres y Apellidos",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" => 'nombres($data->idsolicitante)',
                    'filter'=>false,
                                 ),
		'fechaautorizacion',
		'fechaentregaprestamo',
		'valorprestamo',
		'estatus'=>array(
                    "name" => "estatus",
//                    'htmlOptions'=>array('style'=>'width:70px'),
                    "value" => '$data->estatus0->descripcion',
                    'filter'=>false,
                                 ),
			array(
			'class'=>'CButtonColumn',
                      'template'=>'{update}{view}{delete}',
                       'buttons'=>array(
                            'update'=>array(
                                    'visible'=>'false',
                            ),
                           'view'=>array(
                                    'visible'=>'true',
                                    'label'=>'Ver Prestamo',
                                    'url'=>'Yii::app()->createUrl("/dsolicitanteprestamo/dsolicitanteprestamo/view", array("id"=>$data->idsolicitanteprestamo))',
                            ),
                            'delete'=>array(
                                    'visible'=>'false',
                            ),
                        ),
		),
	),
)); 
function nombres($idsolicitante){
    $nombres = Dsolicitante::model()->find('idsolicitante ='.$idsolicitante);
    $nomape = $nombres->primernombre.' '.$nombres->primerapellido;
    return utf8_encode($nomape);
    
}



?>

<script>
    $(consulta).addClass('active');
</script>