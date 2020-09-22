<?php

require_once 'conn.php';

function getAutor(){
    $mysqli = getConn();
    $query= 'SELECT *FROM `fc_tbl_autor`';
    $result = $mysqli->query($query);
    $autor="<option value='0' >Elige el autor</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $autor.="<option value='$row[id_aut]'>$row[nom_aut]</option>";
    }
    return $autor;
}
echo getAutor();

?>

