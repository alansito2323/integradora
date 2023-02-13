<?php 
session_start();
include"./cone.php";
include"./crud.php";

$crud = new Crud();

$datos = array(
    "username"=>$_POST['username'],
    "password"=>$_POST['password'],
);

$respuesta = $crud->pon($datos);

if($respuesta->getInsertedId()>0){

    header("location:./registro.php");
}
else{
    print_r($respuesta);
}


?>