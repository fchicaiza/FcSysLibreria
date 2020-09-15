<?php 
require_once "../modelos/Autor.php";

$autor=new Autor();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id)){
			$rspta=$autor->insertar($nombre,$descripcion);
			echo $rspta ? "Autor registrado" : "Autor no se pudo registrar";
		}
		else {
			$rspta=$autor->editar($id,$nombre,$descripcion);
			echo $rspta ? "Autor actualizado" : "Autor no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$autor->desactivar($id);
 		echo $rspta ? "Autor Desactivado" : "Categoría no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$autor->activar($id);
 		echo $rspta ? "Autor activado" : "Categoría no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$autor->mostrar($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$autor->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->est_aut=="A")?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_aut.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->id_aut.')"><i class="fa fa-close"></i></button>':
                                        
                            
                            
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->id_aut.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->id_aut.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nom_aut,
 				"2"=>$reg->des_aut,
 				"3"=>($reg->est_aut=="A")?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
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