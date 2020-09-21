<?php
function getConn(){
    $mysqli = mysqli_connect("localhost","root","admin","fc_bdd_libreria");
    if(mysqli_connect_errno($mysqli))
        echo "Fallo al conectar a la base de datos:". mysqli_connect_error();
        $mysqli->set_charset('utf8');
        return $mysqli; 
}

