<?php

require_once 'conn.php';

function getCategoria(){
    $mysqli = getConn();
    $query= 'SELECT *FROM `fc_tbl_categoria`';
    $result = $mysqli->query($query);
    $categorias ="<option value='0' >Elige una categoria</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $categorias.="<option value='$row[id_cat]'>$row[des_cat]</option>";
    }
    return $categorias;
}
echo getCategoria();

?>


