<?php
//Validacion solo números y no permitir el copiado de palabras
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->clientScript->registerScriptFile($baseUrl . '/js/jquery.numeric.js');
$criteria = new CDbCriteria;
$criteria->select='*';
$criteria->order='idmaxprestamo DESC';
$criteria->limit='1';
$montomax = DmaxPrestamos::model()->find($criteria);
//$var = Nestatus::model()->findAll(array('order' => 'descripcion'));
//print_r($model->estatus);exit;
 ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estadistica-prestamos-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="container" >
        
    </div><!-- end container -->
    <div class="container">
        
    <div style="text-align: center;margin-bottom: 2px;margin-top:5px;">
        <br><br>
        <?php
      
        ?>
    </div> 
	<?php // echo $form->errorSummary($model); ?>
    
    <div class="contenido container-fluid">
        
       
            <div class="row">
                <div class="col-md-12">
                    <div class="row"> 
                        <h4 align=center id="subtitulo">Ingrese Fechas a Buscar</h4>
                    </div>
                </div>
            </div>
        
        <br>
         <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <?php echo $form->labelEx($model,'mes'); ?>
		<?php echo $form->dropDownList($model,'mes',array('1'=>'Enero','2'=>'Feberero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'),
                           array(
                                    'prompt'=>'------Seleccione------',
                                )); ?>
                            <?php echo $form->error($model, 'mes', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                    <div class="col-lg-6" id="" style="">
                        <div>
                            <?php echo $form->labelEx($model,'year'); ?>
                            <?php echo $form->textField($model,'year'); ?>
                            <?php echo $form->error($model, 'year', array('class' => 'btn btn-danger')); ?>
                        </div>
                        

                    </div>
                </div>                                                
            </div>
        </div>
        <br>
       
        <br>
                
        <br>
         <div class="form-group col-lg-offset-5 col-lg-7">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar',array('type' => 'button', 'class' => 'btn btn-primary')); ?>
            <br><br>
	</div>
               
                </div> 
                <?php $this->endWidget(); ?>         

        <?php if (isset($datos)) :?>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Estadísticas de prestamos'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> : {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Aprobados <?php echo $datos['aprobado']; ?>',
            y: <?php echo $datos['aprobado']; ?>
        }, {
            name: 'Rechazados <?php echo $datos['rechazado']; ?>',
            y: <?php echo $datos['rechazado']; ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Pendientes <?php echo $datos['pendiente']; ?>',
            y: <?php echo $datos['pendiente']; ?>
        }]
    }]
});
</script>

<?php endif; ?>


