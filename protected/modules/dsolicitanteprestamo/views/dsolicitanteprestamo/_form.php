<?php
//Validacion solo números y no permitir el copiado de palabras
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->clientScript->registerScriptFile($baseUrl . '/js/jquery.numeric.js');
$criteria = new CDbCriteria;
$criteria->select='*';
$criteria->order='idmaxprestamo DESC';
$criteria->limit='1';
$montomax = DmaxPrestamos::model()->find($criteria);

 ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dmax-prestamos-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="container" >
        <div class="row">
            <div class="col-sm-12 text-center">
                <?php if (!isset($update)) {?>
                <h3>Solicitud de Prestamo.</h3>
                <?php }else{ ?>
                <h3>Actualización de Prestamo.</h3>
                <?php  } ?>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="container">
        
    <div style="text-align: center;margin-bottom: 2px;margin-top:5px;">
        <br><br>
        <?php
        $this->widget(
                'ext.bootstrap.widgets.TbLabel', array(
            'type' => 'info',
            'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:12px; span{color:red;}'),
            // 'success', 'warning', 'important', 'info' or 'inverse'
            'label' => 'El Monto Máximo de Prestamos es hasta '.number_format($montomax->maxvalor, 2, ",", ".").
                    ' y su Prestamo será cancelado en 6 Meses',
                )
        );
        ?>
    </div> 
	<?php // echo $form->errorSummary($model); ?>
    
    <div class="contenido container-fluid">
        
       
            <div class="row">
                <div class="col-md-12">
                    <div class="row"> 
                        <h4 align=center id="subtitulo">Ingrese Monto a Solicitar</h4>
                    </div>
                </div>
            </div>
        
        <br>

        <div class="row">
            <div class="col-xs-12 text-center">
                    <div class="form-group col-lg-offset-3 col-lg-6">
                   
                        <?php // echo $form->labelEx($model, 'valorprestamo'); ?>
                        <?php echo $form->textField($model, 'valorprestamo', array('value'=>  trim($model->valorprestamo), 'placeholder' => 'Campo Obligatorio','onkeyup'=>'this.value=this.value.toUpperCase()', 'class' => 'numeric form-control',)); ?>              
                        <?php echo $form->error($model, 'valorprestamo', array('class' => 'btn btn-danger')); ?>
                </div>                                                
            </div>
        </div>
        <br>
        <?php if(isset($model->cuota) && $model->cuota !==null) :?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row"> 
                        <h4 align=center id="subtitulo">Cuotas a Cancelar</h4>
                    </div>
                </div>
            </div>
        <br>
        <div class="row">
            <div class="col-xs-12 text-center">
                    <div class="form-group col-lg-offset-3 col-lg-6">
                        
                            <?php for($i = 0; $i<=5; $i++) :?>
                                <strong>Cuota Nro:<?php echo ($i+1) ?></strong>
                                <?php echo $form->textField($cuotasprestamo, 'valorcuota[]', array('value'=>  trim($model->cuota), 'placeholder' => 'Campo Obligatorio','onkeyup'=>'this.value=this.value.toUpperCase()', 'class' => 'numeric form-control',)); ?>              
                                <?php echo $form->error($cuotasprestamo, 'valorcuota[]', array('class' => 'btn btn-danger')); ?>
                            <?php endfor;?>
                        
                </div>                                                
            </div>
        </div>
        <?php endif;?>
        
        <br>
        <?php if(isset($model->cuota) && $model->cuota !==null) {?>
         <div class="form-group col-lg-offset-5 col-lg-7">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar',array('type' => 'button', 'class' => 'btn btn-primary')); ?>
            <br><br>
	</div>
        <?php }else{?>
                <div class="form-group col-lg-offset-5 col-lg-7">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Calcular' : 'Modificar',array('type' => 'button', 'class' => 'btn btn-primary')); ?>
            <br><br>
	</div>
        <?php }?>
        
                </div> 
                <?php $this->endWidget(); ?>         

<script>
    $(solicitud).addClass('active');
</script>



