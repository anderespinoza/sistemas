<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        
          
	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <!-- Bootstrap CSS -->  
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
        <!-- Bootstrap JS -->  
<!--        <script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>-->
        <?php
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/custom.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/bootstrap.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/bootbox.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/highcharts.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/exporting.js');
        Yii::app()->clientScript->registerScript(    'myHideEffect',    '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',    CClientScript::POS_READY );
        ?>

</head>

<body>

<div class="container" id="page">

        <!--Imagen encabezado-->
        <div class="topbar">		
            <div class="container">
                <div class="pull-left">
                    <!--<img  class="img-responsive" src="<?php // echo Yii::app()->baseUrl ?>/images/gobierno.png" width="auto" height="100%">-->
                </div>
            </div>
        </div>

        <?php 
        include_once Yii::app()->basePath . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'site' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'menu.php';
        ?>        

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
            <style>
.alert {
  margin-bottom: 20px;
  margin-top: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
  color: #31708f;
  background-color: #d9edf7;
  border-color: #0058D6;
  font-size: 18px;
  text-align: center;
/*  font-weight: 900;*/
}

</style>
                 
    
                 <?php if(Yii::app()->user->hasFlash('mensaje')):?>        
                <div class="info">
                <?php
                $this->widget('ext.bootstrap.widgets.TbAlert', array(
                    'fade' => TRUE,
                    'closeText' => '&times;', // false equals no close link
                    'events' => array(),
                    'htmlOptions' => array(),
                    'userComponentId' => 'user',
                    'alerts' => array(// configurations per alert type
                        // success, info, warning, error or danger
                        'mensaje' => array('closeText' => '&times;'),
                    ),
                ));
                ?></div>
                <?php // echo Yii::app()->user->getFlash('mensaje'); 
                ?>
       
        <?php endif; ?>

	<?php echo $content; ?>

	<div class="clear"></div>

        
	<?php 
        include_once Yii::app()->basePath . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'site' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php';
        ?><!-- footer -->

</div><!-- page -->

</body>
</html>
