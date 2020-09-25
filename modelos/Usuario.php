<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($dni,$nombre,$user,$clave,$rol)
	{
		$sql="INSERT INTO fc_tbl_usuario (nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,condicion)
		VALUES ('$dni','$nombre','$user','$clave','$rol','A')";
		return ejecutarConsulta($sql);

	}

	//Implementamos un método para editar registros
	public function editar($id,$dni,$nombre,$user,$clave)
	{
		$sql="UPDATE fc_tbl_usuario SET dni_usu='$dni',nom_usu='$nombre',usu_usu='$user',pass_usu='$clave',id_rol='2',est_usu='A' WHERE idusuario='$id'";
		ejecutarConsulta($sql);

		

	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id)
	{
		$sql="UPDATE fc_tbl_usuario SET est_usu='I' WHERE id_usu='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql="UPDATE fc_tbl_usuario SET est_usu='A' WHERE id_usu='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="SELECT * FROM fc_tbl_usuario WHERE id_usu='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM fc_tbl_usuario";
		return ejecutarConsulta($sql);		
	}


	//Función para verificar el acceso al sistema
	public function verificar($user,$clave)
    {
    	$sql="SELECT * FROM fc_tbl_usuario WHERE usu_usu='$user' AND pass_usu='$clave' AND est_usu='A'"; 
    	return ejecutarConsulta($sql);  
    }
}

?>