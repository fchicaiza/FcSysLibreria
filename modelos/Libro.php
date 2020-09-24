<?php

require "../config/conexion.php";



class Libro {
  
   
    
   //Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($isbn,$titulo,$publicacion,$edicion,$cantidad, $precio,$categoria, $editorial,$autor,$tipo)
	{
              	$sql=" CALL sp_insertarLibro ($isbn,'$titulo','$publicacion',$edicion,$cantidad,$precio,'A',$categoria,'$editorial',$tipo, $autor,'A')" ;
                return ejecutarConsulta($sql);   

	}

	//Implementamos un método para editar registros
	public function editar($id, $isbn, $titulo, $anio, $edicion, $cantidad, $precio,$cat,$edi,$aut,$tip)
	{
		$sql="UPDATE fc_tbl_libro
    INNER JOIN fc_tbl_categoria 
        ON (fc_tbl_libro.id_cat_lib = fc_tbl_categoria.id_cat)
    INNER JOIN fc_tbl_editorial 
        ON (fc_tbl_libro.cod_edi_lib = fc_tbl_editorial.cod_edi)
    INNER JOIN fc_tbl_autor_libro 
        ON (fc_tbl_autor_libro.id_lib_aul = fc_tbl_libro.id_lib)
SET  fc_tbl_libro.isb_lib = $isbn,
     fc_tbl_libro.tit_lib = ' $titulo',
     fc_tbl_libro.apu_lib = '$anio',
     fc_tbl_libro.edc_lib = $edicion,
     fc_tbl_libro.can_lib = $cantidad,
     fc_tbl_libro.pre_lib = $precio,
     fc_tbl_libro.id_cat_lib = $cat,
     fc_tbl_libro.cod_edi_lib = '$edi',
		 fc_tbl_autor_libro.id_aut_aul = $aut,
		 fc_tbl_autor_libro.id_tau_aul = $tip
		 
		 	WHERE fc_tbl_autor_libro.id_lib_aul = $id;";
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
            $sql ="CALL sp_BuscarlibroId($id)";
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
    
        public function listara(){
           $sql="call sp_ListaInsertados()";
           return ejecutarConsulta($sql);
        }
        
//        public function mostrarTodo($id){
//            $sql ="CALL sp_BuscarlibroId($id)";
//            return ejecutarConsultaSimpleFila($sql);
//        }
}
