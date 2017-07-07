<?php
    
    class correo{
        public function init(){return;}
        
        
         public function registroUsuario( $usuario ){
            $return = "<p>Estimado Ciudadano,</p>"
                    . "<p></p>";
            $return .= "Sus datos han sido registrados satisfactoriamente.";
            $return .= "<p></p>"
                    . "<strong>Nombre de Usuario : </strong>" . $usuario->nombreusuario . ""
                    . "<p></p>"
                    . "<strong>Clave: </strong>" . $usuario->clave . ""
                    . "<p></p>"
                    . "<strong>IMPORTANTE:</strong>"
                    . "<p></p>"
                    . "<ul>"
                    . "<li>Debe Iniciar Sesión con su usario y clave creados para poder solicitar su Prestamo .</li>"
                    . "<li>Con sus credenciales tambien puede revisar si ya fue aprobado o no su prestamo.</li>"
                    . "<li>Una Vez que se le haya aprobado su prestamo le enviaremos un correo electrónico para notificarle.</li>"
                    . "<li>A travéz de sus credenciales podrá saber cuales son sus cuotas de pago y fechas para cancelar cada una.</li>"
                   
                    . "</ul>"
                    . "<p></p>"
                    . "Saludos Cordiales";
            return $return;
        }
        
         public function aprobadoPrestamo( $model ){
            $return = "<p>Estimado Ciudadano,</p>"
                    . "<p></p>";
            $return .= "Su prestamo Número " . $model->idsolicitanteprestamo . " fue " . $model->estatus0->descripcion . ".";
            $return .= "<p></p>"
                    . "<strong>IMPORTANTE:</strong>"
                    . "<p></p>"
                    . "<ul>"
                    . "<li>Por favor ingrese a nuestro Sistema con su usuario y clave, .</li>"
                    . "<li>Para que pueda visualizar su monto por cuotas y fechas de pago.</li>"
                   
                    . "</ul>"
                    . "<p></p>"
                    . "Saludos Cordiales";
            return $return;
        }
          public function rechazadoPrestamo( $model ){
            $return = "<p>Estimado Ciudadano,</p>"
                    . "<p></p>";
            $return .= "Su prestamo Número " . $model->idsolicitanteprestamo . " fue " . $model->estatus0->descripcion . ".";
            $return .= "<p></p>"
                    . "<strong>IMPORTANTE:</strong>"
                    . "<p></p>"
                    . "<ul>"
                    . "<li>Si desea mas información comuniquese con nosotros, .</li>"
                    . "</ul>"
                    . "<p></p>"
                    . "Saludos Cordiales";
            return $return;
        }
    }