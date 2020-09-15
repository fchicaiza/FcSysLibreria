<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class Rol {
 //Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($descripcion)
	{
		$sql="INSERT INTO fc_tbl_rol (des_rol,est_rol)
		VALUES ('$descripcion','A')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id,$descripcion)
	{
		$sql="UPDATE fc_tbl_rol SET des_rol='$descripcion' WHERE id_rol='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id)
	{
		$sql="UPDATE fc_tbl_rol SET est_rol='I' WHERE id_rol='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql="UPDATE fc_tbl_rol SET est_rol='A' WHERE id_rol='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="SELECT * FROM fc_tbl_rol WHERE id_rol='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM fc_tbl_rol";
		return ejecutarConsulta($sql);		
	}
}

?>