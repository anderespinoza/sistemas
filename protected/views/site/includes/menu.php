<?php 
if(Yii::app()->user->getState('usuario')){
$usuario =  Yii::app()->user->getState('usuario');
}
?>

<header class="header">

<nav class="navbar navbar-static-top">
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav" >
            <li style="width: 1100px"><center><h4><b>Sistemas de Prestamos</b></h4></center></li>
        </ul>
        <ul class="nav navbar-nav" >
            <!--<li class="dropdown" id="inicio_logo1"><img  class="responsive" src="<?php echo Yii::app()->baseUrl ?>/images/mpprijp_1.png" alt="" width="90" height="100"></li>-->
            <li class="dropdown" id="index"><div></div></li>
            <?php if(Yii::app()->user->isGuest ){?>
            <!--<li class="dropdown" id="consultas"><a href="index.php?r=dtraza/dtraza/create">Reportes</a></li>-->
                        <li class="dropdown cerrar" id="cerrar"><a href="index.php?r=site/login">Iniciar sesión</a></li>  
                        <li class="dropdown registro" id="registro"><a href="index.php?r=dsolicitante/dsolicitante/create">Registro de Usuario</a></li> 

            <!--<li class="dropdown" id="usuario"><a href="index.php?r=dusuario/dusuario/create">Crear Usuario</a></li>-->  
            <?php } ?>
                    
                          
                 
<!--<li class="dropdown" id="index">afsdfsdfsdf<div></div></li>-->
                    <?php if(!Yii::app()->user->isGuest ){
                    ?>
                    <li class="dropdown inicio" id="inicio"><a href="index.php?r=site/index">Inicio</a></li> 
                    <li class="dropdown solicitud" id="solicitud"><a href="index.php?r=dsolicitanteprestamo/dsolicitanteprestamo/create">Solicitar Prestamos</a></li> 
                    <li class="dropdown consulta" id="consulta"><a href="index.php?r=dsolicitanteprestamo/dsolicitanteprestamo/adminuser">Consultar Prestamos</a></li> 
                    <?php
                        if(isset( $usuario->idtipousuario ) && $usuario->idtipousuario == 1){    
                    ?> 
                    
                     <!--<li class="dropdown registrar" id="registar"><a href="index.php?r=personaconcurso/personaconcurso/register">Registrar Funcionario</a></li>--> 
                     <li class="dropdown admin" id="admin"><a href="index.php?r=dsolicitanteprestamo/dsolicitanteprestamo/admin">Administrador</a></li> 
                     <li class="dropdown maxprestamo" id="maxprestamo"><a href="index.php?r=dmaxprestamos/dmaxprestamos/create">Asignar Monto Máximo</a></li> 
                     <li class="dropdown reporte" id="reporte"><a href="index.php?r=dsolicitanteprestamo/dsolicitanteprestamo/estadistica">Estadísticas</a></li> 
                     <?php } ?>
                    <li class="dropdown cerrar" id="cerrar"><a href="index.php?r=site/logout">Cerrar sesión</a></li>  
                    
                    <?php } ?>
            <!--<li class="dropdown" id="inicio_logo2"><img  class="responsive" src="<?php // echo Yii::app()->baseUrl ?>/images/saime.png" alt="" width="90" height="100"></li>-->  
        </ul>
    </div>
</nav>

</header>


