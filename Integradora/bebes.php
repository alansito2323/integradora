<?php
session_start();
include "./cone.php";
include "./crud.php";
if (isset($_SESSION['user_id'])) {
    $crud = new Crud();
    $id =  $_SESSION['user_id'];
    $datos = $crud->obten($id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href=" ./public/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Home</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-4">
                    <div class="card-body">
                        <h2>Añadir bebe</h2>
                        <?php
                        if (isset($_SESSION['err'])) {
                            $answer = $_SESSION['err']; ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '<?php echo $answer; ?>',
                                    text: 'Ta muy grande el muchacho oiga'

                                })
                            </script>
                        <?php
                            unset($_SESSION['err']);
                        }
                        ?>
                        <?php
                        $fechaactual = date('Y-m-d'); 
                        $nuevafecha = strtotime('-4 year', strtotime($fechaactual)); 
                        $nuevafecha = date('Y-m-d', $nuevafecha);
                        ?>
                        <form action="./insert2.php" method="post" id="formu">
                            <div method="post" action="./insert2.php" id="padre_id" name="padre_id">
                            <?php $datos->_id?>
                            </div>
                            
                            <label for="paterno">Apellido paterno</label>
                            <input type="text" class="form-control" id="appa" name="appa">
                            <label for="materno">Apellido materno</label>
                            <input type="text" class="form-control" id="amma" name="amma">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                            <label for="fecha">Fecha de nacimiento</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" min="<?php echo $nuevafecha?>" max="<?php echo $fechaactual ?>">
                            <div>
                            <label >Usuario_padre</label>
                            <output type="text" class="form-control" ><?php echo $datos->username; ?>
                            </div>

                            <button class=" btn btn-primary mt-3">
                                <i class="fa-solid fa-floppy-disk"></i> Agregar</button>
                        </form>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <center><button class="btn btn-danger mt-3"><a href="./cerrarsesion.php">Cerrar sesion</a></button></center>
</body>

</html>