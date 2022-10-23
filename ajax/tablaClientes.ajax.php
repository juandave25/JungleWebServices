<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaClientes
{

    public function mostrarTablaClientes(){

        $cliente = ControladorClientes::ctrMostrarTablaClientes();

        
        $number_filter_row = count($cliente);
        $data = array();

        for ($i = 0; $i < count($cliente); $i++){

            if($cliente[$i]["estado"] == '1'){

                $estado = "<button class='btn btn-success btn-sm mr-2' onclick='estadoCliente(" . $cliente[$i]["id"] . ")'>Activo</button>";

            }else{

                $estado = "<button class='btn btn-danger btn-sm mr-2' onclick='estadoCliente(" . $cliente[$i]["id"] . ")'>Inactivo</button>";

            }

            
            $acciones = "<div class='btn-group'>
            <button class='btn btn-info text-white btn-sm mr-2 btnEditarUsu' onclick='editarCliente(" . $cliente[$i]["id"] . ")'>Editar</button>
            <button class='btn btn-secondary btn-sm mr-2 btnInfoUsu' onclick='verCliente(" . $cliente[$i]["id"] . ")'>Ver</button>
            </div>";
            

                $sub_array = array();
                $sub_array[] = ucwords($cliente[$i]["nit"]);
                $sub_array[] = ucwords($cliente[$i]["nombre"]);
                $sub_array[] = ucwords($cliente[$i]["razonSocial"]);
                $sub_array[] = $estado;
                $sub_array[] = $acciones;
                $data[] = $sub_array;

        }

        $output = array(
            'recordsTotal'  =>  $number_filter_row,
            'data'          =>  $data
        );

        echo json_encode($output);


    }

    
}

// EJECUTAR PROCESO

$mostrarClientes = new TablaClientes();
$mostrarClientes->mostrarTablaClientes();
    




?>