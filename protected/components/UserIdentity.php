<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
//	public function authenticate()
//	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
//	}
    
    public function authenticate()
	{
                
                    if( isset( $this->username ) && isset( $this->password ) ){

                        $usuario = Dusuario::model()->find('upper(nombreusuario) = "'.strtoupper($this->username).'" and clave =  "'.$this->password.'" ');
                   
                            if(isset( $usuario->idusuario ) && $usuario->idusuario !=null  ){
                                    
                                // las siguientes lineas comentadas son si se tiene que realziar un registro de usuarios y validar para el ingreso
//                                $dpersona = Dpersona::model()->find('cedula ='.$cedula);                                
//                                if($dpersona != NULL){
//                                    $datos['idestatus']=$usuario->idestatus;
//                                    $datos['iddireccion']=$usuario->iddireccion;
//                                    $datos['idusuario']=$usuario->idusuario; 
//                                  
//                                    $id_persona=$dpersona->idpersona;
//                                    Yii::app()->user->setState('idpersona',$id_persona);
                                    Yii::app()->user->setState('usuario',$usuario);
//                                    ldap_unbind( $conn );
////                                    print_r($this->username);exit;
//                                    $usuario = Dusuario::model()->find("upper(nombreusuario)=upper('".$this->username."')");
//                                    if(isset($usuario->idestatus) && $usuario->idestatus == 1){
////                                        Yii::app()->user->setState('estatus',$usuario->activo); 
////                                        Yii::app()->session['estatus'] = $usuario->activo;
////                                        Yii::app()->user->setState('idusuario',$usuario->id_usuario);
                                            $this->errorCode = self::ERROR_NONE;
                                            return !$this->errorCode;
//                                    }else{
//                                  Yii::app()->user->setFlash( 'mensaje' , 'El Usuario no se encuentra registrado' );  
//                                  
//                                }
//                                
//                               
//                                     
//                                }else{
//                                  Yii::app()->user->setFlash( 'mensaje' , 'El Usuario no se encuentra registrado' );  
//                                  
//                                }
                                
                            }
                            else{
                                
                               
//                                $this->errorCode = self::ERROR_PASSWORD_INVALID;
//                                return !$this->errorCode;
                                Yii::app()->user->setFlash( 'mensaje' , 'Nombre de Usuario ó Contraseña inválidos' );
                                
                            }
                            
                 
                            
                    }                
               
	}
}