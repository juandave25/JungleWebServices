<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuario.modelo.php";

require_once "../controladores/personas.controlador.php";
require_once "../modelos/persona.modelo.php";

require_once "../controladores/login.controlador.php";
require_once "../modelos/login.modelo.php";

Class AjaxUsuarios

{


    public function ajaxGuardarPersona(){

        $datos = array(
            "dni"           => $this->dni,
            "nombres"       => $this->nombres,
            "apellidos"     => $this->apellidos,
            "direccion"     => $this->direccion,
            "celular"       => $this->celular,
            "email"         => $this->email,
            "genero"        => $this->genero,
            "nacimiento"    => $this->nacimiento,
            "rol"           => 0,
            );
    
            $respuesta = ControladorPersonas::ctrCrearPersonas($datos);
    
            if($respuesta == 'ok'){
    
                $encriptar = password_hash($this->dni, PASSWORD_DEFAULT, [15]);
    
                $usuario = array(
                    "login"         =>  $this->dni,
                    "password"      =>  $encriptar,
                    "perfil"        =>  $this->perfil,
                );
    
                $respuestaU = ControladorUsuarios::ctrCrearUsuario($usuario);
    
                if($respuestaU == 'ok')  $msg = array('msg' => 'Persona creada', 'estado' => true, 'tipo' => 'success');
    
            }else{
                
                $msg = array('msg' => 'Persona ya registrada', 'estado' => false, 'tipo' => 'error');
            }
    
        
    
        echo json_encode($msg);
    
    }

    
    public function ajaxActualizarPersona(){
        
        $datos = array(
            "dni"           => $this->dni,
            "nombres"       => $this->nombres,
            "apellidos"     => $this->apellidos,
            "direccion"     => $this->direccion,
            "celular"       => $this->celular,
            "email"         => $this->email,
            "genero"        => $this->genero,
            "nacimiento"    => $this->nacimiento,
            "rol"           => 0,
            );

        $respuesta = ControladorPersonas::ctrActualizarPersonas($datos); 
        
        if($respuesta == 'ok'){

            $usuario = array(
                "login"         =>  $this->dni,
                "perfil"        =>  $this->perfil,
            );

        $actualizarUsuario = ControladorUsuarios::ctrActualizarUsuarios($usuario);

        if($actualizarUsuario == 'ok')  $msg = array('msg' => 'Usuario actualizado', 'estado' => true, 'tipo' => 'success');

        echo json_encode($msg);
        }



    }
    


    public function ajaxActualizarEstadoUsuario(){

        $valor = $this->usuLogin;

        $usuario = ControladorUsuarios::ctrBuscarUsuario($valor);

        $estado = $usuario['usuEstado'];

       if($estado == 1) {
         $estadoU = 0;   
         $respuesta = ControladorUsuarios::ctrActualizarEstadoUsuario($valor,$estadoU);   
            
        }else{
         $estadoU = 1;   
         $respuesta = ControladorUsuarios::ctrActualizarEstadoUsuario($valor,$estadoU);
        }

        if($respuesta == 'ok') $msg = array('msg' => 'Estado de Usuario Actualizado', 'estado' => true, 'tipo' => 'success');

        echo json_encode($msg);

    }

    
    public function ajaxBuscarUsuario(){

        $valor = $this->usuario;

        $respuesta = ControladorUsuarios::ctrBuscarUsuario($valor);
        
        echo json_encode($respuesta);
    
    
    
    }


}


if (isset($_POST["usuOp"])) {

    if($_POST["usuOp"] == 0){

        $persona                = new AjaxUsuarios();
    
        $persona->dni           = $_POST["dni"];
        $persona->nombres       = strtolower($_POST["nombres"]);
        $persona->apellidos     = strtolower($_POST["apellidos"]);
        $persona->direccion     = strtolower($_POST["direccion"]);
        $persona->celular       = $_POST["celular"];
        $persona->email         = strtolower($_POST["email"]);
        $persona->genero        = $_POST["genero"];
        $persona->nacimiento    = $_POST["nacimiento"];
        $persona->perfil        = strtolower($_POST["perfil"]);
    
        $persona->ajaxGuardarPersona();
    
    }else{

        $persona                = new AjaxUsuarios();
    
        $persona->dni           = $_POST["dni"];
        $persona->nombres       = strtolower($_POST["nombres"]);
        $persona->apellidos     = strtolower($_POST["apellidos"]);
        $persona->direccion     = strtolower($_POST["direccion"]);
        $persona->celular       = $_POST["celular"];
        $persona->email         = strtolower($_POST["email"]);
        $persona->genero        = $_POST["genero"];
        $persona->nacimiento    = $_POST["nacimiento"];
        $persona->perfil        = strtolower($_POST["perfil"]);
    
        $persona->ajaxActualizarPersona();

    }
}

if (isset($_POST["usuEstado"])) {
    $usuario             = new AjaxUsuarios();
    $usuario->usuLogin   = $_POST["usuEstado"];
    $usuario->ajaxActualizarEstadoUsuario();
}

if (isset($_POST["usuDni"])) {
    $usuario             = new AjaxUsuarios();
    $usuario->usuario   = $_POST["usuDni"];
    $usuario->ajaxBuscarUsuario();
}




?>