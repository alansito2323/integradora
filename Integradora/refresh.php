<?php
session_start();
include "./cone.php";
include "./crud.php";

if (isset($_SESSION['user_id'])) {
    $crud = new Crud();
    $id = $_POST['id'];
    $datos = $crud->obten2($id);
    $idmongo = $datos->_id;
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
                    <a href="./home.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Regresar
                    </a>
                    
                    <h2>Editar bebe</h2>

                    <form action="./edit.php" method="post">
                    <input type="text" hidden value="<?php echo $idmongo?>" name="id">    
                    <label for="appa">Apellido paterno</label>
                        <input type="text" class="form-control" id ="appa" name="appa" value="<?php echo $datos->appa; ?>" required>
                        <label for="amma">Apellido materno</label>
                        <input type="text" class="form-control" id ="amma" name="amma"value="<?php echo $datos->amma; ?>" required>
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id ="nombre" name="nombre"value="<?php echo $datos->nombre; ?>" required>
                        <label for="fecha">Fecha de nacimiento</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $datos->fecha; ?>" required>
                        <div>
                            <label >Usuario_padre</label>
                            <output type="text" class="form-control" ><?php echo $datos->user_padre; ?>
                            </div>
                        <button class=" btn btn-warning mt-3">
                           <i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
    
</body>
</html>