// TABLAS

$(document).ready(function () {

    nombreClientes = "#tablaClientes";
    urlClientes = "Ajax/tablaClientes.ajax.php";
    CrearTablas(nombreClientes, urlClientes);



    function CrearTablas(nombre, url) {

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
                "infoFiltered": "(filtrando _MAX_ clientes)",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            },
            "ajax": {
                url: url,
                type: "POST",
                "deferRender": true,
                "retrieve": true,
                "processing": true,
            }
        })

    }

})

// *******************************************************************
// *******************************************************************




//ABRIR MODAL CREACION Cliente
function abrirModalNuevoCliente() {

    const btnGuardar = document.getElementById('btnGuardarCliente');
    const labelCliente = document.getElementById('staticBackdropLabel');
    const cliOp = document.getElementById('cliOp');
    labelCliente.innerText = 'Nuevo Cliente';
    cliOp.value = "0";
    btnGuardar.innerText = "Guardar";

    const myModal = new bootstrap.Modal('#mdlNuevoCliente', {
        keyboard: false
    })
    const modalNuevoCliente = document.getElementById('mdlNuevoCliente');
    myModal.show(modalNuevoCliente);

}


function editarCliente(id) {

    const btnGuardar = document.getElementById('btnGuardarCliente');
    const labelCliente = document.getElementById('staticBackdropLabel');
    const cliOp = document.getElementById('cliOp');
    labelCliente.innerText = 'Editar Cliente';
    cliOp.value = "1";
    btnGuardar.innerText = 'Actualizar';

    const data = new FormData();
    data.append('cliId', id);
    const url = 'Ajax/clientes.ajax.php';
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            // console.log(res);

            let nombre = res.cliNombre;
            let razonSocial = res.cliRazonSocial;
            let nit = res.cliNit;
            let id = res.cliId;

            document.getElementById('nombre').value = nombre.toUpperCase();
            document.getElementById('razonSocial').value = razonSocial.toUpperCase();
            document.getElementById('nit').value = nit;
            document.getElementById('id').value = id;

        }
    }

    const myModal = new bootstrap.Modal('#mdlNuevoCliente', {
        keyboard: false
    })
    const modalNuevoCliente = document.getElementById('mdlNuevoCliente');
    myModal.show(modalNuevoCliente);



}

// GUARDAR Y ACTUALIZAR DATOS DE CLIENTE
const btnGuardarCli = document.getElementById('frmNuevoCliente');
btnGuardarCli?.addEventListener('submit', function (e) {
    e.preventDefault();
    if (validarCampos()) {
        let form = document.querySelector('form');
        const data = new FormData(form);
        const url = 'Ajax/clientes.ajax.php';
        enviarDatosPost(data, url);
        var modal = bootstrap.Modal.getInstance(mdlNuevoCliente);
        modal.hide();
        setTimeout(() => {
            location.reload();
        }, 2000);
    } else {
        Swal.fire(
            'Campos Incorrectos?',
            'Error en los campos por favor validar!',
            'error'
        );
    }
});


// CAMBIAR ESTADO DE CLIENTE
function estadoCliente(id) {
    const data = new FormData();
    data.append('cliEstado', id);
    const url = 'ajax/clientes.ajax.php';
    enviarDatosPost(data, url);
    setTimeout(() => {
        location.reload();
    }, 2000);
}

//VER INFORMACION CLIENTE

function verCliente(id) {
    const data = new FormData();
    data.append('cliId', id);
    const url = 'ajax/clientes.ajax.php';
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            let nombre = res.cliNombre;
            let razonSocial = res.cliRazonSocial;
            let nit = res.cliNit;

            document.getElementById('cliNombre').innerText = nombre.toUpperCase();
            document.getElementById('cliRazonSocial').innerText = razonSocial.toUpperCase();
            document.getElementById('cliNit').innerText = nit;
        }
    }
    const myModal = new bootstrap.Modal('#mdlVerCliente', {
        keyboard: false
    })
    const modalVerCliente = document.getElementById('mdlVerCliente');
    myModal.show(modalVerCliente);

}

//VALIDAR CAMPOS

function validarCampos() {

    let correcto = true;

    if (document.getElementById('nit').value.length <= 2 || document.getElementById('nit').value.length >= 10) {
        correcto = false;
    }

    if (document.getElementById('nombre').value.length <= 2) {
        correcto = false;
    }

    if (document.getElementById('razonSocial').value.length <= 2) {
        correcto = false;
    }

    return correcto;

}


//Envio Informacion Ajax Post
function enviarDatosPost(data, url) {
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
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

var mdlNuevoCliente = document.getElementById('mdlNuevoCliente')
const frmFormularioCliente = document.querySelector("form");

mdlNuevoCliente?.addEventListener('hidden.bs.modal', function () {
    frmFormularioCliente.reset();
});




