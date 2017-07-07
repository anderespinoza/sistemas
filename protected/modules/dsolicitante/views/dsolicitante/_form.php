<?php
//Validacion solo números y no permitir el copiado de palabras
//$co =Personaconcurso::model()->findAll(array('select'=>'t.coordinacion','distinct'=>true, 'order'=>'t.coordinacion'));
//$di =Personaconcurso::model()->findAll(array('select'=>'t.direccion','distinct'=>true, 'order'=>'t.direccion'));
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->clientScript->registerScriptFile($baseUrl . '/js/jquery.numeric.js');

 ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personaconcurso-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="container" >
        <div class="row">
            <div class="col-sm-12 text-center">
                <?php if (!isset($update)) {?>
                <h3>Registro de Solicitud de Prestamos.</h3>
                <?php }else{ ?>
                <h3>Actualización de Solicitud de Prestamo.</h3>
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
                        <h4 align=center id="subtitulo">DATOS PERSONALES</h4>
                    </div>
                </div>
            </div>
        
        <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-2">
                        <?php echo $form->labelEx($model, 'cedula'); ?>
                        <?php echo $form->dropDownList($model, 'letra', array("V" => "V", "E" => "E"),array('class' => 'form-control')); ?> 
                         <?php echo $form->error($model, 'letra', array('class' => 'btn btn-danger')); ?>
                            <?php echo $form->error($model, 'cedula', array('class' => 'btn btn-danger')); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $form->labelEx($model, 'cedula'); ?>
                        <?php echo $form->textField($model, 'cedula', array('size' => 10, 'maxlength'=>'8', 'placeholder' => 'Campo Obligatorio', 'class' => 'numeric form-control',)); ?>
                           
                    </div>
                    <div class="col-lg-6" id="" style="">
                        <?php echo $form->labelEx($model, 'primernombre'); ?>
                        <?php echo $form->textField($model, 'primernombre', array('value'=>  trim($model->primernombre), 'placeholder' => 'Campo Obligatorio','onkeyup'=>'this.value=this.value.toUpperCase()', 'type' => 'text', 'class' => 'string form-control',)); ?>              
                        <?php echo $form->error($model, 'primernombre', array('class' => 'btn btn-danger')); ?>
                    </div>
                </div>                                                
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <?php echo $form->labelEx($model, 'primerapellido'); ?>
                            <?php echo $form->textField($model, 'primerapellido', array('value'=>trim($model->primerapellido),'placeholder' => 'Campo Obligatorio', 'onkeyup'=>'this.value=this.value.toUpperCase()', 'type' => 'text', 'class' => 'string form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($model, 'primerapellido', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                    <div class="col-lg-6" id="" style="">
                        <div>
                            <?php echo $form->labelEx($model, 'correo'); ?>
                            <?php echo $form->textField($model, 'correo', array('size' => 50, 'maxlength' => 30, 'type' => 'text','placeholder' => 'Campo Obligatorio', 'onkeyup'=>'this.value=this.value.toUpperCase()', 'class' => 'form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($model, 'correo', array('class' => 'btn btn-danger')); ?>
                        </div>
                        

                    </div>
                </div>                                                
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6" id="" style="">
                        <div>
                            <?php echo $form->labelEx($model, 'celular'); ?>
                            <?php echo $form->textField($model, 'celular', array('value'=>trim($model->celular),'maxlength' => 11,'placeholder' => 'Campo Obligatorio', 'onkeyup'=>'this.value=this.value.toUpperCase()', 'type' => 'text', 'class' => 'numeric form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($model, 'celular', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <?php echo $form->labelEx($model, 'telefono'); ?>
                            <?php echo $form->textField($model, 'telefono', array('value'=>trim($model->telefono),'maxlength' => 11,'placeholder' => 'Campo Obligatorio', 'onkeyup'=>'this.value=this.value.toUpperCase()', 'type' => 'text', 'class' => 'numeric form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($model, 'telefono', array('class' => 'btn btn-danger')); ?>
                            
                        </div> 
                    </div>
                    
                </div>                                                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6" id="" style="">
                        <div>
                            <?php echo $form->labelEx($usuario, 'nombreusuario'); ?>
                            <?php echo $form->textField($usuario, 'nombreusuario', array('value'=>trim($usuario->nombreusuario),'placeholder' => 'Campo Obligatorio', 'onkeyup'=>'this.value=this.value.toUpperCase()', 'type' => 'text', 'class' => 'string form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($usuario, 'nombreusuario', array('class' => 'btn btn-danger')); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <?php echo $form->labelEx($usuario, 'clave'); ?>
                            <?php echo $form->passwordField($usuario, 'clave', array('value'=>trim($usuario->clave),'placeholder' => 'Campo Obligatorio', 'onkeyup'=>'this.value=this.value.toUpperCase()',  'class' => ' form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($usuario, 'clave', array('class' => 'btn btn-danger')); ?>
                            
                        </div> 
                    </div>
                    
                </div>                                                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <?php echo $form->labelEx($usuario, 'repeatclave'); ?>
                            <?php echo $form->passwordField($usuario, 'repeatclave', array('value'=>trim($usuario->clave),'placeholder' => 'Campo Obligatorio', 'onkeyup'=>'this.value=this.value.toUpperCase()',  'class' => ' form-control', 'autocomplete' => 'off')); ?>
                            <?php echo $form->error($usuario, 'repeatclave', array('class' => 'btn btn-danger')); ?>
                            
                        </div> 
                    </div>
                    
                </div>                                                
            </div>
        </div>
        <br>
         <div class="form-group col-lg-offset-4 col-lg-7">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar',array('type' => 'button', 'class' => 'btn btn-primary')); ?>
             <a class="btn btn-primary" href="index.php?r=site/index">Cancelar</a>
                
            <br><br>
	</div>
        
        
                </div> 
                <?php $this->endWidget(); ?>         

<script>
    $(registro).addClass('active');
</script>