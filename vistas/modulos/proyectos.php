<div class="container animate__animated animate__fadeIn">
  <h1>Proyectos</h1>
  <hr>
  <div class="row">
    <div class="col-md-3 col-sm-12 d-grid gap-2">
      <button type="button" class="btn btn-secondary" onclick="abrirModalNuevoProyecto()">Nuevo Proyecto</button>
    </div>
  </div>
  <br>
  <div class="row shadow-lg p-3 mb-5 bg-body rounded">
    <div class="col-12">
      <table class="table" id="tablaProyectos" style="width:100%">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>


<!-- MODAL INGRESO PROYECTO -->
<div class="modal fade" id="mdlNuevoProyecto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Proyecto</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body bg-light">

        <form class="row g-3 needs-validation" id="frmNuevoProyecto" novalidate>

          <div class="col-md-6">
            <input type="hidden" id="id" name="id">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" minlength="10" maxlength="11" required>
            <div class="invalid-feedback">
              Valida tu información
            </div>
          </div>

          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" minlength="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))" required>
            <div class="invalid-feedback">
              Valida tu información
            </div>
          </div>

          <div class="col-md-12">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="textarea" rows="10" class="form-control" id="descripcion" name="descripcion" minlength="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))" required>
            <div class="invalid-feedback">
              Valida tu información
            </div>
          </div>

          <div class="col-md-6">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" minlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"required>
            <div class="invalid-feedback">
              Valida tu información
            </div>
          </div>

          <div class="col-md-12">
            <input type="text" name="proOp" id="proOp" hidden>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark" id="btnGuardarProyecto">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- MOSTRAR VER PROYECTO -->

<div class="modal fade" id="mdlVerProyecto" tabindex="-1" aria-labelledby="ModalLabelProyecto" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="ModalLabelProyecto">Información del Proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center m-3">
        <h4 id="proCodigo">
          </h5>
          <h5 id="proNombre"></h5>
          <hr>
          <h5 id="proDescripcion"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>