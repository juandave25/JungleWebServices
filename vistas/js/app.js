// ***************************************************************************
// TABLAS

$(document).ready( function () {
    
    nombreUsuarios = "#tablaUsuarios";
    urlUsuarios = "Ajax/tablaUsuarios.ajax.php";
    CrearTablas(nombreUsuarios,urlUsuarios);



function CrearTablas(nombre, url){

    $(nombre).DataTable({
        responsive: true,
        autoWidth: true,
        pagingType: 'full_numbers',
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
          "lengthMenu": "Mostrar _MENU_",
              "zeroRecords": "Sin Registros",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "infoEmpty": "Sin registros",
              "infoFiltered": "(filtrando _MAX_ usuarios)",
              "paginate": {
                  "first":      "Primero",
                  "last":       "Ultimo",
                  "next":       "Siguiente",
                  "previous":   "Anterior"
              },
          },
         "ajax" : {
          url: url,
          type:"POST",
          "deferRender": true,
          "retrieve": true,
          "processing": true,
          }
  })

}

})

// *******************************************************************
// *******************************************************************




//ABRIR MODAL CREACION USUARIO
function abrirModalNuevoUsuario(){

    const btnGuardar = document.getElementById('btnGuardarUsuario');
    const labelUsuario = document.getElementById('staticBackdropLabel');
    document.getElementById('dni').style.display = 'block';
    const usuOp = document.getElementById('usuOp');
    labelUsuario.innerText = 'Nuevo Usuario';
    usuOp.value = "0";
    btnGuardar.innerText = "Guardar";   

    const myModal = new bootstrap.Modal('#mdlNuevoUsuario', {
        keyboard: false
      })
      const modalNuevoUsuario = document.getElementById('mdlNuevoUsuario'); 
      myModal.show(modalNuevoUsuario);  

}


function editarUsuario(dni){

    const btnGuardar = document.getElementById('btnGuardarUsuario');
    const labelUsuario = document.getElementById('staticBackdropLabel');
    document.getElementById('dni').style.display = 'none';
    const usuOp = document.getElementById('usuOp');
    labelUsuario.innerText = 'Editar Usuario';
    usuOp.value = "1";
    btnGuardar.innerText = 'Actualizar';

    const data = new FormData();
    data.append('usuDni',dni);
    const url = 'Ajax/usuarios.ajax.php';
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function(){
        
        if(this.readyState == 4 && this.status == 200){
             let res = JSON.parse(this.responseText);
            // console.log(res);

            const dni = res.perDni;
            const nombre = res.perNombres;
            const apellidos = res.perApellidos;
            const direccion = res.perDireccion;
            const celular = res.perCelular;
            const email = res.perEmail;
            const genero = res.perGenero;
            const nacimiento = res.perNacimiento;
            const cargo = res.usuPerfil;

            document.getElementById('dni').value = dni;
            document.getElementById('nombres').value = nombre;
            document.getElementById('apellidos').value = apellidos;
            document.getElementById('direccion').value = direccion;
            document.getElementById('celular').value = celular;
            document.getElementById('email').value = email;
            document.getElementById('genero').value = genero;
            document.getElementById('nacimiento').value = nacimiento;
            document.getElementById('perfil').value = cargo;

        }
    }

    const myModal = new bootstrap.Modal('#mdlNuevoUsuario', {
        keyboard: false
      })
      const modalNuevoUsuario = document.getElementById('mdlNuevoUsuario'); 
      myModal.show(modalNuevoUsuario); 

    

}

// GUARDAR Y ACTUALIZAR DATOS DE USUARIO
const btnGuardarUsu = document.getElementById('frmNuevoUsuario');
btnGuardarUsu?.addEventListener('submit', function(e){
e.preventDefault();
if(validarCampos()){
    let form = document.querySelector('form');
    const data = new FormData(form);
    const url = 'Ajax/usuarios.ajax.php';
    enviarDatosPost(data,url);
    var modal = bootstrap.Modal.getInstance(mdlNuevoUsuario);
    modal.hide();
    setTimeout(() => {
        location.reload();
    }, 2000);
}else{
    Swal.fire(
        'Campos Incorrectos?',
        'Error en los campos por favor validar!',
        'error'
      );
}
});


// CAMBIAR ESTADO DE USUARIO
function estadoUsuario(dni){
    const data = new FormData();
    data.append('usuEstado',dni);
    const url = 'ajax/usuarios.ajax.php';
    enviarDatosPost(data,url);
    setTimeout(() => {
        location.reload();
    }, 2000);
}

//VER INFORMACION USUARIO

function verUsuario(dni){
    const data = new FormData();
    data.append('usuDni',dni);
    const url = 'ajax/usuarios.ajax.php';
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function(){
        
        if(this.readyState == 4 && this.status == 200){
            let res = JSON.parse(this.responseText);
            const nombre = res.perNombres;
            const apellidos = res.perApellidos;
            const cargo = res.usuPerfil;
            const direccion = res.perDireccion;
            const celular = res.perCelular;
            const email = res.perEmail;
            
            document.getElementById('usuNombre').innerText = nombre.toUpperCase() + " " + apellidos.toUpperCase();
            document.getElementById('usuCargo').innerText = cargo.toUpperCase();
            document.getElementById('usuDireccion').innerText = direccion;
            document.getElementById('usuCelular').innerText = celular;
            document.getElementById('usuEmail').innerText = email;
        }
    }
    const myModal = new bootstrap.Modal('#mdlVerUsuario', {
        keyboard: false
      })
      const modalVerUsuario = document.getElementById('mdlVerUsuario'); 
      myModal.show(modalVerUsuario);  
    
}

//VALIDAR CAMPOS

function validarCampos(){
    
    let correcto = true;

    if(document.getElementById('dni').value.length <= 2 || document.getElementById('dni').value.length >= 14 ){
        correcto = false;
    }

    if(document.getElementById('nombres').value.length <= 2){
        correcto = false;
    }

    if(document.getElementById('apellidos').value.length <= 2){
        correcto = false;
    }

    if(document.getElementById('celular').value.length <= 9 || document.getElementById('celular').value.length >= 13){
        correcto = false;
    }

    var emailField = document.getElementById('email');
    var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if( !validEmail.test(emailField.value) ){
        correcto = false;
    }

    if(document.getElementById('nacimiento').value.length == 0){
        correcto = false;
    }

    var testDate = document.getElementById('nacimiento');
    var date_regex = /^(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[0-2])\/(0[1-9]|1[1-9]|2[1-9]|3[1-9]|4[1-9])$/;

    if (date_regex.test(testDate.value)) {
        correcto = false;    
    }

    return correcto;

}


//Envio Informacion Ajax Post
function enviarDatosPost(data, url){
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire({
                position: 'center',
                icon: res.tipo,
                title: res.msg,
                showConfirmButton: false,
                timer: 1500
              })
        }
    }
    
}

var mdlNuevoUsuario = document.getElementById('mdlNuevoUsuario')
const frmFormulario = document.querySelector("form");
    
    mdlNuevoUsuario?.addEventListener('hidden.bs.modal', function () {
        frmFormulario.reset();
    });




