<?php 
require_once "../modelos/Libro.php";

$libro = new Libro();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$isbn=isset($_POST["isbn"])? limpiarCadena($_POST["isbn"]):"";
$titulo=isset($_POST["titulo"])? limpiarCadena($_POST["titulo"]):"";
$publicacion=isset($_POST["publicacion"])? limpiarCadena($_POST["publicacion"]):"";
$edicion=isset($_POST["edicion"])? limpiarCadena($_POST["edicion"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
$categoria=isset($_POST["categoria"])? limpiarCadena($_POST["categoria"]):"";
$editorial=isset($_POST["editorial"])? limpiarCadena($_POST["editorial"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";
$autor=isset($_POST["autor"])? limpiarCadena($_POST["autor"]):"";

// Variables para llenar el combo box

$cat=isset($_POST["cat"])? limpiarCadena($_POST["cat"]):"";
$edi=isset($_POST["edi"])? limpiarCadena($_POST["edi"]):"";
$aut=isset($_POST["aut"])? limpiarCadena($_POST["aut"]):"";
$tip=isset($_POST["tip"])? limpiarCadena($_POST["tip"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id)){
			$rspta=$libro->insertar($isbn,$titulo,$publicacion,$edicion,$cantidad,$precio,$categoria,$editorial,$tipo,$autor);
                        
			echo $rspta ? "Libro registrado correctamente, si lo requiere agregue mas autores" : "Libro no se pudo registrar";
		}
		else {
			$rspta=$libro->editar($id,$isbn,$titulo,$publicacion,$edicion,$cantidad,$precio,$cat,$edi,$aut,$tip);
			echo $rspta ? "Libro actualizado" : "Libro no se pudo actualizar";
		}
	break;
        
        

	case 'desactivar':
		$rspta=$libro->desactivar($id);
 		echo $rspta ? "Libro Desactivado" : "Libro no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$libro->activar($id);
 		echo $rspta ? "Libro activado" : "Libro no se puede activar";
 		break;
	break;
    
    case 'eliminar':
		$rspta=$libro->eliminar($id);
// 		echo $rspta ? "Autor eliminado" : "El autor no se puede eliminar pues tiene libros asociados a el";
 		break;
	break;

	case 'mostrar':
		$rspta=$libro->mostrar($id);
                if(empty($id)){
                    
                }else{
                                    
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
                }
                

 		break;
	break;
         
	case 'listar':
		$rspta=$libro->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->est_lib=="A")?'<button class="btn btn-primary" onclick="mostrar('.$reg->id_lib.')"><i class="fa fa-pencil" title="Editar"></i></button>'.
 					' <button class="btn btn-success" onclick="desactivar('.$reg->id_lib.')"><i class="fa fa-toggle-on" title="Desactivar"></i></button>'.
                                        ' <button class="btn btn-danger" onclick="eliminar('.$reg->id_lib.')"><i class="fa fa-close" title="Eliminar"></i></button>':
 					'<button class="btn btn-primary" onclick="mostrar('.$reg->id_lib.')"><i class="fa fa-pencil" title="Editar"></i></button>'.
 					' <button class="btn btn-warning" onclick="activar('.$reg->id_lib.')"><i class="fa fa-toggle-off" title="Activar"></i></button>'.
                                        ' <button class="btn btn-danger" onclick="eliminar('.$reg->id_lib.')"><i class="fa fa-close" title="Eliminar"></i></button>',
          
 				"1"=>$reg->isb_lib,
 				"2"=>$reg->tit_lib,
                                "3"=>$reg->apu_lib,
                                "4"=>$reg->edc_lib,
                                "5"=>$reg->can_lib,
                                "6"=>$reg->pre_lib,
 				"7"=>($reg->est_lib=="A")?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-yellow">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
        
}
?>