<?php
class ControladorLogin{

    public function ctrIngresoLogin(){

        if(isset($_POST['usuario'])){


            $tabla = "usuarios";
            $item  = "usuLogin";
            $valor = $_POST["usuario"];
            $contrasena = $_POST['contrasena'];
            
            $usuario = ModeloLogin::mdlMostrarUsuario($tabla, $item, $valor);

            
                $tabla1 = "personas";
                $item1  = "perDni";
                $valor1 = $_POST["usuario"];
            
            $persona = ModeloLogin::mdlMostrarPersona($tabla1, $item1, $valor1);
            
            if(is_array($persona)){

                $persona_dni = $persona['perDni'];
                $persona_nombre = $persona['perNombres'];
                $persona_apellido = $persona['perApellidos'];
            }
                
            if(is_array($usuario)){
                
                if (password_verify($contrasena, $usuario['usuPassword'])) {
                    if ($usuario["usuEstado"] == 1) {
                                             
                                $_SESSION["validarSesionBackend"] = "ok";
                                $_SESSION["usuId"]                = $persona_dni;
                                $_SESSION["usuNombre"]            = $persona_nombre;
                                $_SESSION["usuApellido"]          = $persona_apellido;
                                $_SESSION["usuRol"]               = $usuario["usuPerfil"];
                                
                                echo '<script>
        
                                    window.location = "menu";
        
                                    </script>';
                    }else{
                        echo '<br>
                        <div class="alert alert-danger" role="alert">
                        Usuario Inactivo    
                        </div>';
                    }
                }
                else{
                    echo '<br>
                    <div class="alert alert-danger" role="alert">
                    Contraseña Incorrecta
                    </div>';
                }
            }else{
                echo '<br>
                    <div class="alert alert-danger" role="alert">
                    Usuario Incorrecto
                    </div>';
            }
           
        }
   }
}
?>