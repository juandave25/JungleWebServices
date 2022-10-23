<?php

require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class AjaxProyectos
{

    public function ajaxGuardarProyecto()
    {

        $datos = array(
            "codigo"           => $this->codigo,
            "nombre"   => $this->nombre,
            "descripcion"     => $this->descripcion,
            "precio"     => $this->descripcion,
            "integrantes" => $this->integrantes
        );

        $respuesta = ControladorProyectos::ctrCrearProyecto($datos);

        if ($respuesta == 'ok') {

            $msg = array('msg' => 'Proyecto creado', 'estado' => true, 'tipo' => 'success');
        } else {

            $msg = array('msg' => 'Proyecto ya registrado', 'estado' => false, 'tipo' => 'error');
        }

        echo json_encode($msg);
    }


    public function ajaxActualizarProyecto()
    {

        $datos = array(
            "id" => $this->id,
            "nombre"   => $this->nombre,
            "descripcion"     => $this->descripcion,
            "precio"     => $this->descripcion,
        );

        $respuesta = ControladorProyectos::ctrActualizarProyecto($datos);

        if ($respuesta == 'ok') {

            $msg = array('msg' => 'Proyecto actualizado', 'estado' => true, 'tipo' => 'success');

            echo json_encode($msg);
        }
    }

    public function ajaxActualizarProyectoDetalle($info)
    {

        $datos = $info;

        $respuesta = ControladorProyectos::ctrActualizarProyectoIntegrantes($datos);

        if ($respuesta == 'ok') {

            $msg = array('msg' => 'Proyecto actualizado', 'estado' => true, 'tipo' => 'success');

            echo json_encode($msg);
        }
    }



    public function ajaxActualizarEstadoProyecto()
    {

        $valor = $this->id;

        $proyecto = ControladorProyectos::ctrBuscarProyecto($valor);

        $estado = $proyecto['proEstado'];

        if ($estado == 1) {
            $estadoC = 0;
            $respuesta = ControladorProyectos::ctrActualizarEstadoProyecto($valor, $estadoC);
        } else {
            $estadoC = 1;
            $respuesta = ControladorProyectos::ctrActualizarEstadoProyecto($valor, $estadoC);
        }

        if ($respuesta == 'ok') $msg = array('msg' => 'Estado de Proyecto Actualizado', 'estado' => true, 'tipo' => 'success');

        echo json_encode($msg);
    }


    public function ajaxBuscarProyecto()
    {

        $valor = $this->id;

        $respuesta = ControladorProyectos::ctrBuscarProyecto($valor);

        echo json_encode($respuesta);
    }
}


if (isset($_POST["proOp"])) {

    if ($_POST["proOp"] == 0) {

        $proyecto               = new AjaxProyectos();

        $proyecto->nombre           = $_POST["nombre"];
        $proyecto->precio           = $_POST["precio"];
        $proyecto->descripcion       = strtolower($_POST["descripcion"]);
        $proyecto->codigo     = strtolower($_POST["codigo"]);
        $proyecto->integrantes =$_POST["integrantes"];

        $proyecto->ajaxGuardarProyecto();
    } else {

        $proyecto                = new AjaxProyectos();

        $proyecto->id  = $_POST["id"];
        $proyecto->precio           = $_POST["precio"];
        $proyecto->descripcion       = strtolower($_POST["descripcion"]);
        $proyecto->codigo     = strtolower($_POST["codigo"]);
        $proyecto->integrantes = $_POST["integrantes"];

        $proyecto->ajaxActualizarProyecto();
        $proyecto->ajaxActualizarProyectoDetalle($integrantes);

    }
}

if (isset($_POST["proEstado"])) {
    $proyecto             = new AjaxProyectos();
    $proyecto->id  = $_POST["proEstado"];
    $proyecto->ajaxActualizarEstadoProyecto();
}

if (isset($_POST["proId"])) {
    $proyecto             = new AjaxProyectos();
    $proyecto->id   = $_POST["proId"];
    $proyecto->ajaxBuscarProyecto();
}
