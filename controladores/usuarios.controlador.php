<?php
class ControladorUsuarios {

    public static function ctrMostrarTablaUsuarios(){
        
        $respuesta = ModeloUsuario::mdlMostrarTablaUsuarios();

        return $respuesta;
    }

    public static function ctrCrearUsuario($usuario){

        $datosUsuario = array(
            "login"             => $usuario["login"],
            "password"          => $usuario["password"],
            "perfil"            => $usuario["perfil"],
        );

            $respuesta = ModeloUsuario::mdlCrearUsuario("usuarios", $datosUsuario);

            return $respuesta; 

    }

    public static function ctrBuscarUsuario($valor){
        
        $tabla = 'personas';
        
        $respuesta = ModeloUsuario::mdlBuscarUsuario($tabla, $valor);

        return $respuesta;  

    }

    public static function ctrActualizarEstadoUsuario($valor, $estadoU){
        
        $tabla = 'usuarios';

        $respuesta = ModeloUsuario::mdlActualizarEstadoUsuario($tabla, $valor, $estadoU);

        return $respuesta;  

    }




}














?>