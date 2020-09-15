var tabla;

// Función que se ejecuta al inicio

function init() {
    mostrarform(false);
    listar();
    
 
 $("#formulario").on("submit",function(e)
 {
        guardaryeditar(e);   
 });
}

//Función limpiar

function limpiar() {
    $("#id").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
}
//Funcion mostrar formulario

function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
    }
}
function cancelarform() {
    limpiar();
    mostrarform(false);
}
// listar

function listar() {
    tabla = $('#tbllistado').dataTable(
            {
                "aProcessing": true, //Activamos el procesamiento del datatables
                "aServerSide": true, //Paginación y filtrado realizados por el servidor
                dom: 'Bfrtip', //Definimos los elementos del control de tabla
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
                "ajax":
                        {
                            url: '../ajax/autor.php?op=listar',
                            type: "get",
                            dataType: "json",
                            error: function (e) {
                                console.log(e.responseText);
                            }
                        },
                        "bDestroy":true,
                        "iDisplayLength": 5, //Paginación
                        "order": [[0,"desc"]] //(orden, columnas)

            }).DataTable();
}

// Funcion para guardar y editar
function guardaryeditar(e){
    e.preventDefault(); // no se activará la acción prdeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
    
    $.ajax({
        url:"../ajax/autor.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function (datos) {
            alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

init();