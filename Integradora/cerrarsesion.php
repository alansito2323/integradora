<?php 
include"./cone.php";
include"./crud.php";

$crud = new Crud();
$crud->cerrar();
header("location:./inciarsesion.php");
exit;
?>