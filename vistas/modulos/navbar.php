<nav class="navbar navbar-dark bg-dark fixed-top mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="menu"><img src="vistas/img/logo-blanco.png" width="200" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu Principal</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body bg-dark">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="clientes">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="salir">Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<br>
<br>
<br>
<div class="ps-2 bg-light animate__animated animate__fadeIn">
  <p><b><?php echo ucwords($_SESSION['usuNombre']) ." ". ucwords($_SESSION['usuApellido']) ?></b>
  <small>(<?php echo ucwords($_SESSION['usuRol']) ?>)</small></p>
</div>