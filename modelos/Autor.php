<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Autor
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$descripcion)
	{
		$sql="INSERT INTO fc_tbl_autor (nom_aut, des_aut, est_aut)
		VALUES ('$nombre','$descripcion','A')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id,$nombre,$descripcion)
	{
		$sql="UPDATE fc_tbl_autor SET nom_aut='$nombre',des_aut='$descripcion' WHERE id_aut='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id)
	{
		$sql="UPDATE fc_tbl_autor SET est_aut='I' WHERE id_aut='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql="UPDATE fc_tbl_autor SET est_aut='A' WHERE id_aut='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="SELECT * FROM fc_tbl_autor WHERE id_aut='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM fc_tbl_autor";
		return ejecutarConsulta($sql);		
	}
}

?>