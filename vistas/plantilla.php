
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="vistas/img/favicon.png" type="image/x-icon">
    <link rel="icon" href="vistas/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/plugins/sweet_alert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables/jquery.dataTables.min.css">
    <title>Jungle Web Services</title>
</head>
<body>
<?php
if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {
    
    echo '<div id="right-panel" class="right-panel">';

    include "modulos/navbar.php";

    if (isset($_GET["ruta"])) {
    
        if ($_GET["ruta"] == "menu" ||
            $_GET["ruta"] == "clientes" ||
            $_GET["ruta"] == "usuarios" ||            
            $_GET["ruta"] == "salir") {
            include "modulos/" . $_GET["ruta"] . ".php";

        }

    }

    
    echo "</div>";
    
    include "modulos/footer.php";
} else {

    include "modulos/login.php";

}


?>


<script src="vistas/plugins/datatables/jquery-3.5.1.js"></script>
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/js/app.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="vistas/plugins/sweet_alert2/sweetalert2.all.min.js"></script>
</body>
</html>
