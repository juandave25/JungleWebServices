<?php

require_once "conexion.php";

class ModeloCliente{

    public static function mdlMostrarTablaClientes()
    {
            $stmt = Conexion::conectar()->prepare("SELECT cliId as 'id', cliNit as 'nit', cliRazonSocial as 'razonSocial', cliNombre as 'nombre', cliEstado as 'estado'  FROM clientes");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
    }

    public static function mdlCrearCliente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cliNombre, cliRazonSocial, cliNit, cliEstado) VALUES 
        (:nombre, :razonSocial, :nit, '1')");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":razonSocial", $datos["razonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt = null;
    }

    public static function mdlBuscarCliente($tabla, $valor){

        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cliId = :valor ORDER BY cliId DESC");
            
            $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
            $stmt->execute();
               
            } catch (\Throwable $th) {
                return "error";
            }
            return $stmt->fetch();
    
            $stmt = null;

    }

    public static function mdlActualizarCliente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cliNit = :nit, cliNombre= :nombre, cliRazonSocial=:razonSocial WHERE cliId = :id");
        
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":razonSocial", $datos["razonSocial"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt = null;


    }

    public static function mdlActualizarEstadoCliente($tabla, $valor, $estadoU){

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cliEstado = :estado WHERE cliId = :valor");
            
            $stmt->bindParam(":estado", $estadoU, PDO::PARAM_STR);
            $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
            $stmt->execute();
               
            } catch (Throwable $th) {
                return "error";
            }
            return "ok";
    
            $stmt = null;

    }


}




?>