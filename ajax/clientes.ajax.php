<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes

{


    public function ajaxGuardarCliente()
    {

        $datos = array(
            "nit"           => $this->nit,
            "razonSocial"   => $this->razonSocial,
            "nombre"     => $this->nombre,
        );

        $respuesta = ControladorClientes::ctrCrearCliente($datos);

        if ($respuesta == 'ok') {

            $msg = array('msg' => 'Cliente creado', 'estado' => true, 'tipo' => 'success');
        } else {

            $msg = array('msg' => 'Cliente ya registrado', 'estado' => false, 'tipo' => 'error');
        }

        echo json_encode($msg);
    }


    public function ajaxActualizarCliente()
    {

        $datos = array(
            "id" => $this->id,
            "nit"           => $this->nit,
            "razonSocial"   => $this->razonSocial,
            "nombre"     => $this->nombre,
        );

        $respuesta = ControladorClientes::ctrActualizarClientes($datos);

        if ($respuesta == 'ok') {

            $msg = array('msg' => 'Cliente actualizado', 'estado' => true, 'tipo' => 'success');

            echo json_encode($msg);
        }
    }



    public function ajaxActualizarEstadoCliente()
    {

        $valor = $this->id;

        $cliente = ControladorClientes::ctrBuscarCliente($valor);

        $estado = $cliente['cliEstado'];

        if ($estado == 1) {
            $estadoC = 0;
            $respuesta = ControladorClientes::ctrActualizarEstadoCliente($valor, $estadoC);
        } else {
            $estadoC = 1;
            $respuesta = ControladorClientes::ctrActualizarEstadoCliente($valor, $estadoC);
        }

        if ($respuesta == 'ok') $msg = array('msg' => 'Estado de Cliente Actualizado', 'estado' => true, 'tipo' => 'success');

        echo json_encode($msg);
    }


    public function ajaxBuscarCliente()
    {

        $valor = $this->id;

        $respuesta = ControladorClientes::ctrBuscarCliente($valor);

        echo json_encode($respuesta);
    }
}


if (isset($_POST["cliOp"])) {

    if ($_POST["cliOp"] == 0) {

        $cliente               = new AjaxClientes();

        $cliente->nit           = $_POST["nit"];
        $cliente->nombre       = strtolower($_POST["nombre"]);
        $cliente->razonSocial     = strtolower($_POST["razonSocial"]);


        $cliente->ajaxGuardarCliente();
    } else {

        $cliente                = new AjaxClientes();

        $cliente->id  = $_POST["id"];
        $cliente->nit           = $_POST["nit"];
        $cliente->nombre       = strtolower($_POST["nombre"]);
        $cliente->razonSocial     = strtolower($_POST["razonSocial"]);

        $cliente->ajaxActualizarCliente();
    }
}

if (isset($_POST["cliEstado"])) {
    $cliente             = new AjaxClientes();
    $cliente->id  = $_POST["cliEstado"];
    $cliente->ajaxActualizarEstadoCliente();
}

if (isset($_POST["cliId"])) {
    $cliente             = new AjaxClientes();
    $cliente->id   = $_POST["cliId"];
    $cliente->ajaxBuscarCliente();
}
