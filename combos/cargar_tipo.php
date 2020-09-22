<?php

require_once 'conn.php';

function getTipo(){
    $mysqli = getConn();
    $query= 'SELECT *FROM `fc_tbl_tipoautor`';
    $result = $mysqli->query($query);
    $tipo ="<option value='0' >Elige el tipo de autor</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $tipo.="<option value='$row[id_tau]'>$row[des_tau]</option>";
    }
    return $tipo;
}
echo getTipo();

?>

