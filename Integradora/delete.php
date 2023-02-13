<?php
session_start();
include "./cone.php";
include "./crud.php";

if (isset($_SESSION['user_id'])) {
    $crud = new Crud();
    $id = $_POST['id'];
    $datos = $crud->obten2($id);
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
                    <a href="./index.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Regresar
                    </a>
                    
                    <h2>Eliminar bebe</h2>

                    <table class="table table-bordered">
                        <thead>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Nombre</th>
                            <th>Fecha de nacieminto</th>
                            <th>Usuario_padre</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $datos->appa;?></td>
                                <td><?php echo $datos->amma;?></td>
                                <td><?php echo $datos->nombre;?></td>
                                <td><?php echo $datos->fecha;?></td>
                                <td><?php echo $datos->user_padre;?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="alert alert-danger" role="alert">
                    <p>¿Seguro?</p>
                    <p>Una vez eliminado ya valio </p>
                    </div>

                    <form action="./borra.php" method="post">
                        <input type="text" name="id" value="<?php echo $datos->_id?>"hidden>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-user-xmark"></i>Eliminar
                        </button>
                    </form>

    
                </div>
            </div>
        </div>

    </div>

</div>
</body>
</html>