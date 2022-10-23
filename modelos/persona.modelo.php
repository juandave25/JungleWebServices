<?php

require_once "conexion.php";

class ModeloPersona
{
    public static function mdlIngresarPersona($tabla, $datos)
    
    {
        try {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(perDni, perNombres, perApellidos, perDireccion, perCelular, perEmail, perGenero, perNacimiento, perRol) VALUES 
        (:dni, :nombres, :apellidos, :direccion, :celular, :email, :genero, :nacimiento, :rol)");

        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
        $stmt->bindParam(":nacimiento", $datos["nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->execute();
        } catch (\Throwable $th) {
            return "error";
        }
        return "ok";

        $stmt->close();
        $stmt = null;
    
    }

    public static function mdlActualizarPersona($tabla, $datos)
    
    {
        try {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET perNombres = :nombres, perApellidos =:apellidos, perDireccion = :direccion, perCelular = :celular, perEmail = :email, perGenero = :genero, perNacimiento = :nacimiento, perRol = :rol WHERE perDni = :dni");    
        

        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
        $stmt->bindParam(":nacimiento", $datos["nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
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