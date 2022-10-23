<?php
class ControladorClientes {

    public static function ctrMostrarTablaClientes(){
        
        $respuesta = ModeloCliente::mdlMostrarTablaClientes();

        return $respuesta;
    }

    public static function ctrCrearCliente($cliente){

        $datosCliente = array(
            "nit"             => $cliente["nit"],
            "razonSocial"          => $cliente["razonSocial"],
            "nombre"            => $cliente["nombre"],
        );

            $respuesta = ModeloCliente::mdlCrearCliente("clientes", $datosCliente);

            return $respuesta; 

    }

    public static function ctrBuscarCliente($valor){
        
        $tabla = 'clientes';
        
        $respuesta = ModeloCliente::mdlBuscarCliente($tabla, $valor);

        return $respuesta;  

    }

    public static function ctrActualizarClientes($valor){
        $tabla = 'clientes';
        
        $respuesta = ModeloCliente::mdlActualizarCliente($tabla, $valor);

        return $respuesta;
    }

    public static function ctrActualizarEstadoCliente($valor, $estadoC){
        
        $tabla = 'clientes';

        $respuesta = ModeloCliente::mdlActualizarEstadoCliente($tabla, $valor, $estadoC);

        return $respuesta;  

    }




}
