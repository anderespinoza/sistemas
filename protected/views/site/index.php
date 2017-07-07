<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
?>

<section>
    <div class="container-fluid">

        <div style="text-align: center;">
            <br><br>
            <h3><b> Estimado usuario, Bienvenido al Sistema de Prestamos.</b> </h3>
            <br>
            <div style="text-align: justify; display:block">
                <!--<p >Para ingresar al sistema pulse Iniciar Sesión.</p>-->
   
<!--                <p >Es un placer presentar esta nueva herramienta que simplifica los trámites
                    que se llevan a cabo en las Oficinas SAIME, ofreciendo respuesta de manera
                    oportuna a todos nuestros usuarios venezolanos y de otras nacionalidades.</p>-->
                
                            <center><p><strong>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/prestamos.jpg'); ?>
                        </strong></p></center>
            </div>
        </div>
    </div>
</section><!-- end section -->

<script>
    $(inicio).addClass('active');
    
</script>