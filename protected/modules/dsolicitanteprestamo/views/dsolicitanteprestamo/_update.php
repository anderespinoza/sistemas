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
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <?php echo $form->labelEx($model, 'idsolicitanteprestamo'); ?>
                            <?php echo $form->textField($model, 'idsolicitanteprestamo', array('value'=>trim($model->idsolicitanteprestamo),'size' => 60, 'maxlength' => 100, 'readonly' => 'readonly', 'onkeyup'=>'this.value=this.value.toUpperCase()', 'type' => 'text', 'class' => 'string form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($model, 'idsolicitanteprestamo', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                    <div class="col-lg-6" id="" style="">
                        <div>
                            <?php echo $form->labelEx($model, 'estatus'); ?>
                             <?php echo $form->dropDownList($model, 'estatus', CHtml::listData(Nestatus::model()->findAll(array('order' => 'descripcion')), 'idestatus', 'descripcion'), array('prompt' => '------------------ Seleccione ------------------', 'class' => 'form-control',)); ?>
                            <?php echo $form->error($model, 'estatus', array('class' => 'btn btn-danger')); ?>
                        </div>
                        

                    </div>
                </div>                                                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-6 text-center">
                    <div lass="col-lg-6" id="" style="">
                   
                        <?php echo $form->labelEx($model, 'valorprestamo'); ?>
                        <?php echo $form->textField($model, 'valorprestamo', array('value'=>  trim($model->valorprestamo), 'readonly' => 'readonly','onkeyup'=>'this.value=this.value.toUpperCase()', 'class' => 'numeric form-control',)); ?>              
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



