<?php
session_start();
include "./cone.php";
include "./crud.php";

if (isset($_SESSION['user_id'])) {
    $crud = new Crud();
    $id =  $_SESSION['user_id'];
    $datos = $crud->obten($id);
}

$_POST['padre_id']=$datos->username;

$id = $_POST['id'];
$datos = array(
    "appa"=>$_POST['appa'],
    "amma"=>$_POST['amma'],
    "nombre"=>$_POST['nombre'],
    "fecha"=>$_POST['fecha'],
    "user_padre"=>$_POST['padre_id']
);

$respuesta = $crud->editar2($id, $datos);

        if($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0){
         $_SESSION['mensaje_crud']='update';
            header("location:./home.php");
        }
        else{
            print_r($respuesta);
        }


?>