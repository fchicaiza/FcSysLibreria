<?php 
require_once "../modelos/Rol.php";

$rol=new Rol();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id)){
			$rspta=$rol->insertar($descripcion);
			echo $rspta ? "Rol registrado" : "Rol no se pudo registrar";
		}
		else {
			$rspta=$rol->editar($id,$descripcion);
			echo $rspta ? "Rol actualizado" : "Rol no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$rol->desactivar($id);
 		echo $rspta ? "Autor Desactivada" : "Autor no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$rol->activar($id);
 		echo $rspta ? "Rol activado" : "Rol no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$rol->mostrar($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$rol->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->id_rol,
 				"1"=>$reg->des_rol,
 				"2"=>$reg->est_rol
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