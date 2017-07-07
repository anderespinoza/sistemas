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

<h1>Administrador de Prestamos</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dsolicitante-prestamo-grid',
	'dataProvider'=>$model->search(),
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
                                    'visible'=>'true',
                            ),
                           'view'=>array(
                                    'visible'=>'false',
                            ),
                            'delete'=>array(
                                    'visible'=>'false',
                                    'label'=>'Eliminar',
                                    'url'=>'Yii::app()->createUrl("/personaconcurso/personaconcurso/delete", array("id"=>$data->codplanilla))',
                                    'options'=>array(
//                                        'confirm' => 'Está seguro que desea eliminar la asistencia del alumno?',
                                                                 
                        ),

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
    $(admin).addClass('active');
</script>