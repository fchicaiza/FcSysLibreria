<?php

require "../config/conexion.php";



class Libro {
  
   
    
   //Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($isbn,$titulo,$publicacion,$edicion,$cantidad, $precio,$categoria, $editorial)
	{
		$sql="INSERT INTO fc_tbl_libro (isb_lib, tit_lib, apu_lib, edc_lib, can_lib, pre_lib, est_lib, id_cat_lib, cod_edi_lib)
		VALUES ('$isbn','$titulo','$publicacion','$edicion','$cantidad','$precio','A','$categoria','$editorial')";
		return ejecutarConsulta($sql);
                
//                $idLib= mysqli_insert_id(ejecutarConsulta($sql));
//                
//                $sql="INSERT INTO fc_tbl_autor_libro(id_aut_aul, id_lib_aul, id_tau_aul, est_aul) VALUES ('','$idLib','','A')" ;
//                return ejecutarConsulta($sql);
                
	}

	//Implementamos un método para editar registros
	public function editar($id,$isbn,$titulo,$anio,$edicion,$cantidad, $precio)
	{
		$sql="UPDATE fc_tbl_libro SET isb_lib='$isbn', tit_lib='$titulo', apu_lib= '$anio',edc_lib='$edicion',can_lib='$cantidad', pre_lib='$precio',   WHERE id_lib='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id)
	{
		$sql="UPDATE fc_tbl_libro SET est_lib='I' WHERE id_lib='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql="UPDATE fc_tbl_libro SET est_lib='A' WHERE id_lib='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="SELECT * FROM fc_tbl_libro WHERE id_lib='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}
        
        public function mostrarAutores($param) {
            
        }

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM fc_tbl_libro";
		return ejecutarConsulta($sql);		
	}
      
        public function eliminar($id){
          		$sql="DELETE FROM fc_tbl_libro WHERE id_lib='$id'";
		return ejecutarConsultaSimpleFila($sql);  
        }
    
        public function listarTodo($id){
            
        }
}
