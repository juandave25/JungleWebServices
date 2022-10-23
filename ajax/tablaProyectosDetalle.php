<?php

require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class TablaProyectosDetalle
{

    public function mostrarTablaProyectosDetalle(){
        $id= $_GET["proId"];
        $proyectoDetalle = ControladorProyectos::ctrMostrarTablaProyectosDetalle($id);

        
        $number_filter_row = count($proyectoDetalle);
        $data = array();

        for ($i = 0; $i < count($proyectoDetalle); $i++){

            if($proyectoDetalle[$i]["estado"] == '1'){

                $estado = "<button class='btn btn-success btn-sm mr-2' onclick='estadoProyectoDetalle(" . $proyectoDetalle[$i]["id"] . ")'>Activo</button>";

            }else{

                $estado = "<button class='btn btn-danger btn-sm mr-2' onclick='estadoProyectoDetalle(" . $proyectoDetalle[$i]["id"] . ")'>Inactivo</button>";

            }

            
            $acciones = "<div class='btn-group'>
            <button class='btn btn-info text-white btn-sm mr-2 btnEditarUsu' onclick='editarProyectoDetalle(" . $proyectoDetalle[$i]["id"] . ")'>Editar</button>
            </div>";
            

                $sub_array = array();
                $sub_array[] = ucwords($proyectoDetalle[$i]["nombre"]);
                $sub_array[] = ucwords($proyectoDetalle[$i]["apellidos"]);
                $sub_array[] = ucwords($proyectoDetalle[$i]["email"]);
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

$mostrarProyectosDetalle = new TablaProyectosDetalle();
$mostrarProyectosDetalle->mostrarTablaProyectosDetalle();
    




?>