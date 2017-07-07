<?php
//Validacion solo números y no permitir el copiado de palabras
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->clientScript->registerScriptFile($baseUrl . '/js/jquery.numeric.js');

 ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dmax-prestamos-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="container" >
        <div class="row">
            <div class="col-sm-12 text-center">
                <?php if (!isset($update)) {?>
                <h3>Registro de Monto para Prestamos.</h3>
                <?php }else{ ?>
                <h3>Actualización del Monto para Prestamos.</h3>
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
            'type' => 'warning',
            'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:12px; span{color:red;}'),
            // 'success', 'warning', 'important', 'info' or 'inverse'
            'label' => 'Los campos marcados con asterisco * son obligatorios',
                )
        );
        ?>
    </div> 
	<?php // echo $form->errorSummary($model); ?>
    
    <!-------------------------------------------------------------- DATOS PERSONALES----------------------------------------------------->
        
    <div class="contenido container-fluid">
        
       
            <div class="row">
                <div class="col-md-12">
                    <div class="row"> 
                        <h4 align=center id="subtitulo">Ingrese Monto Máximo para Prestamos</h4>
                    </div>
                </div>
            </div>
        
        <br>

        <div class="row">
            <div class="col-xs-12 text-center">
                    <div class="form-group col-lg-offset-3 col-lg-6">
                   
                        <?php echo $form->labelEx($model, 'maxvalor'); ?>
                        <?php echo $form->textField($model, 'maxvalor', array('value'=>  trim($model->maxvalor), 'placeholder' => 'Campo Obligatorio','onkeyup'=>'this.value=this.value.toUpperCase()', 'type' => 'text', 'class' => 'numeric form-control',)); ?>              
                        <?php echo $form->error($model, 'maxvalor', array('class' => 'btn btn-danger')); ?>
                </div>                                                
            </div>
        </div>
        <br>

        
        <br>
         <div class="form-group col-lg-offset-5 col-lg-7">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar',array('type' => 'button', 'class' => 'btn btn-primary')); ?>
            <br><br>
	</div>
        
                </div> 
                <?php $this->endWidget(); ?>         

<script>
    $(maxprestamo).addClass('active');
</script>

