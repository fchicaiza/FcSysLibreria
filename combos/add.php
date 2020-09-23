<?php
$conexion = mysqli_connect("localhost", "root", "admin", "fc_bdd_libreria");

$naut = $_POST["naut"];
$ide = $_POST["ide"];
$taut = $_POST["taut"];

$sql ="INSERT INTO fc_tbl_autor_libro (id_aut_aul, id_lib_aul, id_tau_aul, est_aul) VALUES ($naut,$ide,$taut,'A')";
mysqli_query($conexion , $sql);
echo 1;

?>