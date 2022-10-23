<div class="container animate__animated animate__fadeIn">
<h1>Clientes</h1>
<hr>
<div class="row">
    <div class="col-md-3 col-sm-12 d-grid gap-2">
    <button type="button" class="btn btn-secondary" onclick="abrirModalNuevoCliente()">Nuevo Cliente</button>
    </div>
</div>
<br>
<div class="row shadow-lg p-3 mb-5 bg-body rounded">
    <div class="col-12">
    <table class="table" id="tablaClientes" style="width:100%">
        <thead>
            <tr>
                <th>Nit</th>
                <th>Nombre</th>
                <th>Razon Social</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>
</div>


<!-- MODAL INGRESO CLIENTE -->
<div class="modal fade" id="mdlNuevoCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Cliente</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body bg-light">
        
      <form class="row g-3 needs-validation" id="frmNuevoCliente" novalidate>
        
      <div class="col-md-6">
            <input type="hidden" id="id" name="id">
            <label for="nit" class="form-label">Nit</label>
            <input type="text" 
                   class="form-control" 
                   id="nit" 
                   name="nit"
                   minlength="10"
                   maxlength="11"
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                   required>
            <div class="invalid-feedback">
             Valida tu información
            </div>
        </div>
        
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" 
                   class="form-control" 
                   id="nombre"
                   name="nombre" 
                   minlength="1"
                   onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))" 
                   required>
            <div class="invalid-feedback">
            Valida tu información
            </div>
        </div>

        <div class="col-md-6">
            <label for="razon_social" class="form-label">Razón Social</label>
            <input type="text" 
                   class="form-control" 
                   id="razonSocial"
                   name="razonSocial" 
                   minlength="1"
                   onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))" 
                   required>
            <div class="invalid-feedback">
            Valida tu información
            </div>
        </div>

        <div class="col-md-12">
            <input type="text" name="cliOp" id="cliOp" hidden>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark" id="btnGuardarCliente">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>  
    </div>
  </div>
</div>



<!-- MOSTRAR VER CLIENTE -->

<div class="modal fade" id="mdlVerCliente" tabindex="-1" aria-labelledby="ModalLabelCliente" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="ModalLabelCliente">Información del Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center m-3">
          
          <h4 id="cliNit"></h4>
          <h5 id="cliNombre"></h5>
          <hr>
          <h5 id="cliRazonSocial"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


