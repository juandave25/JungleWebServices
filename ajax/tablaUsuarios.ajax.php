<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuario.modelo.php";

class TablaUsuarios
{

    public function mostrarTablaUsuarios(){

        $usuarios = ControladorUsuarios::ctrMostrarTablaUsuarios();

        
        $number_filter_row = count($usuarios);
        $data = array();

        for ($i = 0; $i < count($usuarios); $i++){

            if($usuarios[$i]["estado"] == '1'){

                $estado = "<button class='btn btn-success btn-sm mr-2' onclick='estadoUsuario(" . $usuarios[$i]["dni"] . ")'>Activo</button>";

            }else{

                $estado = "<button class='btn btn-danger btn-sm mr-2' onclick='estadoUsuario(" . $usuarios[$i]["dni"] . ")'>Inactivo</button>";

            }

            
            $acciones = "<div class='btn-group'>
            <button class='btn btn-info text-white btn-sm mr-2 btnEditarUsu' onclick='editarUsuario(" . $usuarios[$i]["dni"] . ")'>Editar</button>
            <button class='btn btn-secondary btn-sm mr-2 btnInfoUsu' onclick='verUsuario(" . $usuarios[$i]["dni"] . ")'>Ver</button>
            </div>";
            

                $sub_array = array();
                $sub_array[] = $usuarios[$i]["dni"];
                $sub_array[] = ucwords($usuarios[$i]["nombres"]);
                $sub_array[] = ucwords($usuarios[$i]["apellidos"]);
                $sub_array[] = ucwords($usuarios[$i]["perfil"]);
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

$mostrarUsuarios = new TablaUsuarios();
$mostrarUsuarios->mostrarTablaUsuarios();
    




?>