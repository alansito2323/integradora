<?php 
session_start();
include "./cone.php";
include "./crud.php";
if (isset($_SESSION['user_id'])) {
    $crud = new Crud();
    $id =  $_SESSION['user_id'];
    $datos = $crud->obten($id);
    $datos2 = $crud->show();
}

$_POST['padre_id']=$datos->username;

$datos = array(
    "appa"=>$_POST['appa'],
    "amma"=>$_POST['amma'],
    "nombre"=>$_POST['nombre'],
    "fecha"=>$_POST['fecha'],
    "user_padre"=>$_POST['padre_id']
);


    $respuesta = $crud->pon2($datos);
    if ($respuesta==true) {
        session_start();
        $_SESSION['msg'] = 'Se ha registrado exitosamente';
        header("location:./home.php");
    }
