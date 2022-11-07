<?php

require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class TablaProyectos
{

    public function mostrarTablaProyectos(){

        $proyecto = ControladorProyectos::ctrMostrarTablaProyectos();

        setlocale(LC_MONETARY,"en_US");
        $number_filter_row = count($proyecto);
        $data = array();

        for ($i = 0; $i < count($proyecto); $i++){

            if($proyecto[$i]["estado"] == '1'){

                $estado = "<button class='btn btn-success btn-sm mr-2' onclick='estadoProyecto(" . $proyecto[$i]["id"] . ")'>Activo</button>";

            }else{

                $estado = "<button class='btn btn-danger btn-sm mr-2' onclick='estadoProyecto(" . $proyecto[$i]["id"] . ")'>Inactivo</button>";

            }

            
            $acciones = "<div class='btn-group'>
            <button class='btn btn-info text-white btn-sm mr-2 btnEditarUsu' onclick='editarProyecto(" . $proyecto[$i]["id"] . ")'>Editar</button>
            <button class='btn btn-secondary btn-sm mr-2 btnInfoUsu' onclick='verProyecto(" . $proyecto[$i]["id"] . ")'>Ver</button>
            </div>";
            

                $sub_array = array();
                $sub_array[] = strtoupper(ucwords($proyecto[$i]["codigo"]));
                $sub_array[] = ucwords($proyecto[$i]["nombre"]);
                $sub_array[] = ucwords($proyecto[$i]["descripcion"]);
                $sub_array[] = $proyecto[$i]["precio"];
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

$mostrarProyectos = new TablaProyectos();
$mostrarProyectos->mostrarTablaProyectos();
