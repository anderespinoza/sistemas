<?php
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->clientScript->registerScriptFile($baseUrl . '/js/jquery.numeric.js');
//);
?>
<div class="content_central" style="margin-left: 320px;"> 


    <div class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
<div class="container">
    
    <div class="row">
		<div class="col-md-4 col-md-offset-0" style="padding-top: 5%">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title col-md-offset-4">Iniciar Sesi&oacute;n</h3>
                    </div>
                    <div class="panel-body">
                    <form accept-charset="UTF-8" role="form">
                    <fieldset>
                        <div class="form-group">
                            <div class="input-group "><span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                <?php echo $form->dropDownList($model, 'letra', array("V" => "V", "E" => "E"),array('size' => 1, 'maxlength' => 1, 'placeholder' => 'Letra', 'class' => 'form-control', 'required' => 'required', 'id' => 'login')); ?>
                                <?php echo $form->error($model, 'letra'); ?>
                            </div>
                        </div>
			<div class="form-group">
                            <div class="input-group "><span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                <?php echo $form->textField($model, 'cedula', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Cédula de Identidad', 'class' => 'numeric form-control', 'required' => 'required', 'id' => 'login')); ?>
                                <?php echo $form->error($model, 'cedula'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <?php echo $form->textField($model, 'pnombre', array('size' => 50, 'placeholder' => 'Primer Nombre', 'type' => 'text', 'class' => 'string form-control', 'required' => 'required')); ?>
                                <?php echo $form->error($model, 'password'); ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <?php echo $form->textField($model, 'papellido', array('size' => 50, 'placeholder' => 'Primer Apellido', 'type' => 'text', 'class' => 'string form-control', 'required' => 'required')); ?>
                                <?php echo $form->error($model, 'password'); ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                 'model'=>$model,
                                 'attribute'=>'fechanac',
                                 'value'=>$model->fechanac,
                                 'language' => 'es',
                                 'htmlOptions' => array('size' => 40, 'placeholder' => 'Fecha de Nacimiento', 'type' => 'text', 'class' => 'form-control', 'required' => 'required'),
                                 'options'=>array(
                                  'autoSize'=>true,
                                  'defaultDate'=>$model->fechanac,
                                  'dateFormat'=>'dd/mm/yy',
//                                  'buttonImage'=>'../images/calendario.png',
                                  'buttonImageOnly'=>true,
                                  'buttonText'=>'',
                                  'selectOtherMonths'=>true,
                                  'showAnim'=>'slide',
                                  'showButtonPanel'=>true,
                                  'showOn'=>'both', 
                                  'showOtherMonths'=>true, 
                                  'changeMonth' => 'true', 
                                  'changeYear' => 'true', 
                                  //'minDate'=>'date("Y-m-d")', 
                                  //'maxDate'=>date("Y").'-12-31',
                                  ),
                                )); 
                               ?>
                                <?php echo $form->error($model, 'password'); ?>
                            </div>
                        </div>
                        <span class="help-block" style="color: #1A4D91; text-align: center" ><p>Ingrese sus datos para validar.</p></span>
			<input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">


                    </fieldset>
                    </form>
                    </div>
                </div>
                   
                </div>
    </div>
</div>       
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>
