<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Editorial
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($descripcion)
	{
		$sql="INSERT INTO fc_tbl_editorial (des_edi, est_edi)
		VALUES ('$descripcion','A')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id,$descripcion)
	{
		$sql="UPDATE fc_tbl_editorial SET des_edi='$descripcion' WHERE id_edi='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id)
	{
		$sql="UPDATE fc_tbl_editorial SET est_edi='I' WHERE id_edi='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql="UPDATE fc_tbl_editorial SET est_edi='A' WHERE id_edi='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="SELECT * FROM fc_tbl_editorial WHERE id_edi='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM fc_tbl_editorial";
		return ejecutarConsulta($sql);		
	}
      
        public function eliminar($id){
          		$sql="DELETE FROM fc_tbl_editorial WHERE id_edi='$id'";
		return ejecutarConsultaSimpleFila($sql);  
        }
        
        
}

?>