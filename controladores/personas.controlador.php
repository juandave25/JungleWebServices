<?php
class ControladorPersonas{

    public static function ctrCrearPersonas($datos){

        $datosPersona = array(
            "dni"           => $datos["dni"],
            "nombres"       => $datos["nombres"],
            "apellidos"     => $datos["apellidos"],
            "direccion"     => $datos["direccion"],
            "celular"       => $datos["celular"],
            "email"         => $datos["email"],
            "genero"        => $datos["genero"],
            "nacimiento"    => $datos["nacimiento"],
            "rol"           => $datos["rol"],
            );

            $respuesta = ModeloPersona::mdlIngresarPersona("personas", $datosPersona);

            return $respuesta;    
    }

    public static function ctrActualizarPersonas($datos){

        $datosPersona = array(
            "dni"           => $datos["dni"],
            "nombres"       => $datos["nombres"],
            "apellidos"     => $datos["apellidos"],
            "direccion"     => $datos["direccion"],
            "celular"       => $datos["celular"],
            "email"         => $datos["email"],
            "genero"        => $datos["genero"],
            "nacimiento"    => $datos["nacimiento"],
            "rol"           => $datos["rol"],
            );

            $respuesta = ModeloPersona::mdlActualizarPersona("personas", $datosPersona);

            return $respuesta;    

    }



}





?>