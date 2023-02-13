<?php
session_start();
include "./cone.php";
include "./crud.php";

if (isset($_SESSION['user_id'])) {
    $crud = new Crud();
    $id =  $_SESSION['user_id'];
    $datos = $crud->obten($id);
    $padre = $datos->username;
    $datos2 = $crud->show2($padre);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Sus bebes <?php echo $padre;?></h2>
                    <a href="./bebes.php" class="btn btn-primary">
                        Agregar nuevo bebe
                    </a>
                    <hr>
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Nombre</th>
                            <th>Fecha de nacimiento</th>
                            <th>Usuario_padre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>

                        </thead>
                        <tbody>

                        
                        <?php 
                        
                        foreach($datos2 as $item){?>

                                <tr>
                                    <td><?php echo $item->appa; ?> </td>
                                    <td><?php echo $item->amma; ?> </td>
                                    <td><?php echo $item->nombre; ?> </td>
                                    <td><?php echo $item->fecha; ?> </td>
                                    <td><?php echo $item->user_padre; ?> </td>
                                    <td class="text-center">
                                        <form action="./refresh.php" method="post">
                                            <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
                                            <button class="btn btn-warning">
                                                <i class="fa-solid fa-user-pen"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form action="./delete.php" method="post">
                                            <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-user-xmark"></i>
                                               
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                          <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<center><button class="btn btn-danger mt-3"><a href="./cerrarsesion.php">Cerrar sesion</a></button></center>
</body>
</html>