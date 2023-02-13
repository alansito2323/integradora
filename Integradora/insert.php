<?php 
include"./cone.php";
include"./crud.php";

$crud = new Crud();
    $datos = array(
        "username"=>$_POST['username'],
        "password"=>md5($_POST['password']),
    );
    $respuesta = $crud->pon($datos);
    if ($respuesta==true) {
        session_start();
        $_SESSION['msg'] = 'Se ha registrado exitosamente';
        header("location:./inciarsesion.php");
    } 
    else{
        session_start();
        $_SESSION['err'] = 'Username repetido';
        header("location:./registro.php");
    }


?>