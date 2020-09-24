var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
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
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
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
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/libro.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/libro.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	})
        
	limpiar();
}

function mostrar(id)
{
	$.post("../ajax/libro.php?op=mostrar",{id : id}, function(data, status)
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
                $("#categoria").val(data.des_cat);
                $("#editorial").val(data.des_edi);
                $("#autor").val(data.nom_aut);
                $("#tipo").val(data.des_tau);
              
 	});
        
        
}



//Función para desactivar registros
function desactivar(id)
{
	bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/libro.php?op=desactivar", {id : id}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	})	
        }
	})
}

//Función para activar registros
function activar(id)
{
	bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/libro.php?op=activar", {id : id}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	})	
        }
	})
}

function eliminar(id){
    $.post("../ajax/libro.php?op=eliminar", {id : id}, function(e){
        		bootbox.alert("Autor eliminado exitosamente");
	            tabla.ajax.reload();
        	});	
}
init();