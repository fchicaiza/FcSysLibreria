var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(true);
    listar();
 

    $("#form").on("submit", function (e)
    {
        guardaryeditar(e);
    });
}


//Función limpiar
function limpiar()
{
    $("#isbn").val("");
    $("#titulo").val("");
    $("#publicacion").val("");
    $("#edicion").val("");
    $("#cantidad").val("");
    $("#precio").val("");
    $("#id").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listaregistros").hide();
        $("#formregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else
    {
        $("#listaregistros").show();
        $("#formregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar()
{
    tabla = $('#tblistado').dataTable(
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
                            url: '../ajax/libro.php?op=listar',
                            type: "get",
                            dataType: "json",
                            error: function (e) {
                                console.log(e.responseText);
                            }
                        },
                "bDestroy": true,
                "iDisplayLength": 5, //Paginación
                "order": [[0, "desc"]]//Ordenar (columna,orden)
                
            }).DataTable();
            
           
}
//Función para guardar o editar

function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", false);
    var formData = new FormData($("#form")[0]);

    $.ajax({
        url: "../ajax/libro.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos)
        {
            console.log(datos);
            if (datos == "Libro no se pudo registrar") {
                bootbox.alert("Libro no se pudo registrar");
            } else {
                bootbox.alert(datos);
                mostrarform(false);
                tabla.ajax.reload();
            }

        }

    });

    limpiar();
}

function mostrar(id)
{
    $.post("../ajax/libro.php?op=mostrar", {id: id}, function (data, status)
    {

        data = JSON.parse(data);
        mostrarform(true);

//                console.log(data);  
//                console.log(data.nom_aut);
        console.log($("#id").val(data.id_lib));

        $("#id").val(data.id_lib);
        $("#isbn").val(data.isb_lib);
        $("#titulo").val(data.tit_lib);
        $("#publicacion").val(data.apu_lib);
        $("#edicion").val(data.edc_lib);
        $("#cantidad").val(data.can_lib);
        $("#precio").val(data.pre_lib);
        $("#categoria").val(data.id_cat_lib);
        $("#editorial").val(data.cod_edi_lib);


    })
}

//Función para desactivar registros
function desactivar(id)
{
    bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function (result) {
        if (result)
        {
            $.post("../ajax/libro.php?op=desactivar", {id: id}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            })
        }
    })
}

//Función para activar registros
function activar(id)
{
    bootbox.confirm("¿Está Seguro de activar la Categoría?", function (result) {
        if (result)
        {
            $.post("../ajax/libro.php?op=activar", {id: id}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            })
        }
    })
}

function eliminar(id) {
    $.post("../ajax/libro.php?op=eliminar", {id: id}, function (e) {
        bootbox.alert("Autor eliminado exitosamente");
        tabla.ajax.reload();
    });
}
init();

/////// antes de 


$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: '../combos/cargar_categorias.php',
        data: {'peticion': 'cargar_categorias'}
    })
            .done(function (cargar_cat) {
                $('#categoria').html(cargar_cat);

            })
            .fail(function () {
                alert('Hubo un problema al cargar las categorias');
            });
});


$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: '../combos/cargar_editoriales.php',
        data: {'peticion': 'cargar_editoriales'}
    })
            .done(function (cargar_edi) {
                $('#editorial').html(cargar_edi);

            })
            .fail(function () {
                alert('Hubo un problema al cargar las editoriales');
            });
});

$(document).ready(function () {
    $('#tabaut').load('tablaautores.php');
});


$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: '../combos/cargar_autores.php',
        data: {'peticion': 'cargar_autores'}
    })
            .done(function (cargar_aut) {
                $('#autor').html(cargar_aut);

            })
            .fail(function () {
                alert('Hubo un problema al cargar los autores');
            });
});




$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: '../combos/cargar_tipo.php',
        data: {'peticion': 'cargar_tipo'}
    })
            .done(function (cargar_tip) {
                $('#tipo').html(cargar_tip);

            })
            .fail(function () {
                alert('Hubo un problema al cargar los tipos de autor');
            });
});



$(document).ready(function () {
    $('#tabaut').load('tablaautores.php');
});


