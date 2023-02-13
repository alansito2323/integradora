<?php
session_start();
include "./cone.php";
include "./crud.php";
$crud = new Crud();
$id = $_POST['id'];

$respuesta = $crud->quita2($id);

if($respuesta->getDeletedCount()>0){
    $_SESSION['mensaje_crud']='delete';
    header("location:./home.php");
}
else{
    print_r($respuesta);
}

?>