<?php

require_once 'conn.php';

function getEditorial(){
    $mysqli = getConn();
    $query= 'SELECT *FROM `fc_tbl_editorial`';
    $result = $mysqli->query($query);
    $editoriales ="<option value='0' >Elige una editorial</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $editoriales.="<option value='$row[cod_edi]'>$row[des_edi]</option>";
    }
    return $editoriales;
}
echo getEditorial();

?>

