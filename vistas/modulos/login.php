<div class="text-center mt-2">
    <img src="vistas/img/logo.png" class="mt-2" alt="">
    <hr>
    <h1>Bienvenid@</h1>
</div>
<br>
<div class="row justify-content-md-center">
    <div class="col-5 shadow p-3 mb-5 bg-body rounded">
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                <label for="floatingInput">Usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
                <label for="floatingPassword">Contraseña</label>
            <div class="d-grid gap-2">
                <button class="btn btn-secondary mt-3" id="ingresoFrmLogin" type="submit">Ingresar</button>
            </div>
            <?php
						$login = new ControladorLogin();
						$login->ctrIngresoLogin();
					?> 
        </div>
        </form>
    </div>
</div>

