<?php

require_once "conexion.php";

class ModeloUsuario{

    public static function mdlMostrarTablaUsuarios()
    {
            $stmt = Conexion::conectar()->prepare("SELECT personas.perDni as dni, personas.perNombres as nombres, personas.perApellidos as apellidos, usuarios.usuPerfil as perfil, usuarios.usuEstado as estado FROM personas INNER JOIN usuarios WHERE personas.perDni = usuarios.usuLogin");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt = null;
    }

    public static function mdlCrearUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuLogin, usuPassword, usuPerfil, usuEstado) VALUES 
        (:usuario, :contrasena, :perfil, '1')");

        $stmt->bindParam(":usuario", $datos["login"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlBuscarUsuario($tabla, $valor){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN usuarios ON personas.perDni = usuarios.usuLogin  WHERE personas.perDni = :valor ORDER BY personas.perDni DESC");
            
            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            $stmt->execute();
               
            } catch (\Throwable $th) {
                return "error";
            }
            return $stmt->fetch();
    
            $stmt->close();
            $stmt = null;

    }

    public static function mdlActualizarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuPerfil = :perfil WHERE usuLogin = :usuario");
        
        $stmt->bindParam(":usuario", $datos["login"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;


    }

    public static function mdlActualizarEstadoUsuario($tabla, $valor, $estadoU){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuEstado = :estado WHERE usuLogin = :valor");
            
            $stmt->bindParam(":estado", $estadoU, PDO::PARAM_STR);
            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            $stmt->execute();
               
            } catch (\Throwable $th) {
                return "error";
            }
            return "ok";
    
            $stmt->close();
            $stmt = null;

    }


}




?>