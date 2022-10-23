<?php

require_once "controladores/plantillas.controlador.php";
require_once "controladores/login.controlador.php";


require_once "modelos/login.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
?>
