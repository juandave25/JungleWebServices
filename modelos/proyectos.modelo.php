<?php

require_once "conexion.php";

class ModeloProyecto
{

    public static function mdlMostrarTablaProyectos()
    {
        $stmt = Conexion::conectar()->prepare("SELECT proId as 'id', proCodigo as 'codigo', proNombre as 'nombre', proDescripcion as 'descripcion', proPrecio as 'precio', proEstado as 'estado' FROM proyectos");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public static function mdlMostrarTablaProyectosDetalle($id_proyecto)
    {
        $stmt = Conexion::conectar()->prepare("SELECT pr.proiId as 'id' , per.perNombres as 'nombre' ,per.perApellidos as 'apellidos' , per.perEmail as 'email', proiRol as 'rol' 
            FROM proyectos pr 
            INNER JOIN proyectos_integrantes pi ON pr.proId = pi.proiProId 
            INNER JOIN personas per ON pi.proiPersonaId=per.perDni 
            WHERE pr.proId=:proid");

        $stmt->bindParam(":proid", $id_proyecto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public static function mdlCrearProyecto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(proCodigo, proNombre, proDescripcion, proPrecio, proEstado) 
        VALUES (:codigo,:nombre,:descripcion,:precio,1)");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            $id_proyecto = Conexion::conectar()->lastInsertId("proyectos");
            $proyectos = new ModeloProyecto();
            $proyectos->mdlCrearProyectoIntegrante($id_proyecto, "proyectos_integrantes", $datos["integrantes"]);

            return "ok";
        } else {

            return "error";
        }

        $stmt = null;
    }

    public function mdlCrearProyectoIntegrante($id_proyecto, $tabla, $datos)
    {
        foreach ($datos as $item) {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(proiProId, proiPersonaId, proiRol, proiEstado) VALUES (:idproyecto, :personaid, :rol, 1)");

            $stmt->bindParam(":idproyecto", $id_proyecto, PDO::PARAM_INT);
            $stmt->bindParam(":personaid", $item["personaid"], PDO::PARAM_INT);
            $stmt->bindParam(":rol", $item["rol"], PDO::PARAM_STR);

            $stmt->execute();
            $stmt = null;
        }
    }

    public static function mdlBuscarProyecto($tabla, $valor)
    {

        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE proId = :valor ORDER BY proId DESC");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\Throwable $th) {
            return "error";
        }
        return $stmt->fetch();

        $stmt = null;
    }

    public static function mdlActualizarProyecto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET proCodigo = :id, proNombre= :nombre, proCodigo=:codigo, proDescripcion=:descripcion, proPrecio=:precio WHERE proId = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["razonSocial"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["razonSocial"], PDO::PARAM_INT);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt = null;
    }

    public static function mdlActualizarProyectoIntegrante($tabla, $datos)
    {
        foreach ($datos as $item) {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET proiRol = :rol, proipersonaId=:personaid, WHERE proiId = :id");

            $stmt->bindParam(":rol", $item["rol"], PDO::PARAM_INT);
            $stmt->bindParam(":personaid", $item["personaid"], PDO::PARAM_INT);
            $stmt->bindParam(":id", $item["id"], PDO::PARAM_STR);

            $stmt->execute();
            $stmt = null;
        }
    }

    public static function mdlActualizarEstadoProyecto($tabla, $valor, $estadoU)
    {

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET proEstado = :estado WHERE proId = :valor");

            $stmt->bindParam(":estado", $estadoU, PDO::PARAM_STR);
            $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Throwable $th) {
            return "error";
        }
        return "ok";

        $stmt = null;
    }

    public static function mdlActualizarEstadoProyectoIntegrante($tabla, $valor, $estadoU)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET proiEstado = :estado WHERE proiId = :valor");

            $stmt->bindParam(":estado", $estadoU, PDO::PARAM_STR);
            $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Throwable $th) {
            return "error";
        }
        return "ok";
    }
}
