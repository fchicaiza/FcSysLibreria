//
//  $(document).ready(function(){
//		$('#btnagregar').click(function(){
//			var datos=$('#frmajax').serialize();
//			$.ajax({
//				type:"POST",
//				url:"../combos/agregar_libro_parcial.php",
//				data:datos,
//				success:function(r){
//					if(r==1){
//						alert("agregado con exito");
//					}else{
//						alert("Fallo el server");
//					}
//				}
//			});
//
//			return false;
//		});
//	});
//  
$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: '../combos/cargar_categorias.php',
        data:{'peticion':'cargar_categorias'}
    })
            .done(function (cargar_cat){
              $('#categoria').html( cargar_cat);
                
            })
            .fail(function (){
                alert('Hubo un problema al cargar las categorias');
            }) ;                   
});


$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: '../combos/cargar_editoriales.php',
        data:{'peticion':'cargar_editoriales'}
    })
            .done(function (cargar_edi){
              $('#editorial').html( cargar_edi);
                
            })
            .fail(function (){
                alert('Hubo un problema al cargar las editoriales');
            }) ;                   
});

  $(document).ready(function(){
      $('#tabaut').load('tablaautores.php');
  });


//$(document).ready(function(){
//    $('#btnAgregar').click(function(){
//        var datos =$('#formulario').serialize();
//        $.ajax({
//            type: 'POST',
//            url: "../combos/agregar_libro_parcial",
//            data: datos,
//            success: function (r){
//                if(r==1){
//                    alert("Datos agregados exitosamente");
//                }else{
//                    alert("Datos no agregados");
//                }
//            }
//        });
//        
//        return false;
//    });
//});
