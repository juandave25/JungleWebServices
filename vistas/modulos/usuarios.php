<div class="container animate__animated animate__fadeIn">
<h1>Usuarios</h1>
<hr>
<div class="row">
    <div class="col-md-3 col-sm-12 d-grid gap-2">
    <button type="button" class="btn btn-secondary" onclick="abrirModalNuevoUsuario()">Nuevo Empleado</button>
    </div>
</div>
<br>
<div class="row shadow-lg p-3 mb-5 bg-body rounded">
    <div class="col-12">
    <table class="table" id="tablaUsuarios" style="width:100%">
        <thead>
            <tr>
                <th>Dni</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>
</div>


<!-- MODAL INGRESO USUARIO -->
<div class="modal fade" id="mdlNuevoUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Usuario</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body bg-light">
        
      <form class="row g-3 needs-validation" id="frmNuevoUsuario" novalidate>
        
      <div class="col-md-6">
            <label for="dni" class="form-label">Dni</label>
            <input type="text" 
                   class="form-control" 
                   id="dni" 
                   name="dni"
                   minlength="4"
                   maxlength="15"
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                   required>
            <div class="invalid-feedback">
             Valida tu información
            </div>
        </div>
        
        <div class="col-md-6">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" 
                   class="form-control" 
                   id="nombres"
                   name="nombres" 
                   minlength="1"
                   onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))" 
                   required>
            <div class="invalid-feedback">
            Valida tu información
            </div>
        </div>

        <div class="col-md-6">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" 
                   class="form-control" 
                   id="apellidos"
                   name="apellidos" 
                   minlength="1"
                   onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))" 
                   required>
            <div class="invalid-feedback">
            Valida tu información
            </div>
        </div>

        <div class="col-md-6">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" 
                   class="form-control" 
                   id="direccion"
                   name="direccion" 
                   minlength="5"
                   >
            
        </div>

        <div class="col-md-6">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" 
                   class="form-control" 
                   id="celular" 
                   name="celular"
                   minlength="10"
                   maxlength="12"
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                   required>
            <div class="invalid-feedback">
             Valida tu información
            </div>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" 
                   class="form-control" 
                   id="email" 
                   name="email"
                   minlength="3"
                   required>
            <div class="invalid-feedback">
             Valida tu información
            </div>
        </div>

        <div class="col-md-6">
            <label for="genero" class="form-label">Genero</label>
            <select class="form-select" id="genero" name="genero" required>
            <option selected value="M">Masculino</option>
            <option value="F">Femenino</option>
            </select>
            <div class="invalid-feedback">
             Valida tu información
            </div>
        </div>

        <div class="col-md-6">
            <label for="nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" 
                   class="form-control" 
                   id="nacimiento" 
                   name="nacimiento"
                   required>
            <div class="invalid-feedback">
             Valida tu información
            </div>
        </div>

        <div class="col-md-12">
            <label for="perfil" class="form-label">Cargo</label>
            <select class="form-select" id="perfil" name="perfil" required>
            <option selected value="gerente general">Gerente General</option>
            <option value="planner creativa">Planner Creativa</option>
            <option value="copywriter o redactor">Copywriter o Redactor</option>
            <option value="diseñador gráfico">Diseñador Gráfico</option>
            <option value="area financiera">Area Financiera</option>
            </select>
            <div class="invalid-feedback">
             Valida tu información
            </div>
        </div>

        <div class="col-md-12">
            <input type="text" name="usuOp" id="usuOp" hidden>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark" id="btnGuardarUsuario">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>  
    </div>
  </div>
</div>



<!-- MOSTRAR VER USUARIO -->

<div class="modal fade" id="mdlVerUsuario" tabindex="-1" aria-labelledby="ModalLabelUsuario" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="ModalLabelUsuario">Información de usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center m-3">
          
          <h4 id="usuNombre"></h4>
          <h5 id="usuCargo"></h5>
          <hr>
          <h5 id="usuDireccion"></h5>
          <h5 id="usuCelular"></h5>
          <h5 id="usuEmail"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


