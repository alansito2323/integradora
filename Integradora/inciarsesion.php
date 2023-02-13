<?php
session_start();

include "./cone.php";
include "./crud.php";

if (!empty($_POST['username']) || !empty($_POST['password'])) {
    $crud = new Crud();

    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($crud->checa($username, $password)) {

        header('location: ./home.php');
        exit;
    } else {
        
        $_SESSION['err'] = 'Zzzzz(No se ha iniciado sesion)';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sytle.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Baby Fresh</title>
</head>

<body>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container">
                <div class="form">
                    <h2>Iniciar sesion</h2>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        $answer = $_SESSION['msg']; ?>
                        <script>
                            Swal.fire(
                                'Fino señores',
                                '<?php echo $answer; ?>',
                                'success'
                            )
                        </script>
                    <?php
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['err'])) {
                        $answer = $_SESSION['err']; ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: '<?php echo $answer;?>',
                                text: 'Usuario y contraseña no coinciden'
                                
                            })
                        </script>
                    <?php
                        unset($_SESSION['err']);
                    }
                    ?>
                    <form action="./inciarsesion.php" method="post">
 
                    <div class="inputBox">
                            <input type="text" placeholder="Usuario" required class="input-div one" id="username" name="username">
                            
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Contraseña" required class="form-control" id="password" name="password">
                        </div>
                        <div class="middle">
                            <center><button class="btn btn1"><i class="fa-solid fa-floppy-disk"></i> Iniciar sesion</button></center>
                        </div>
                        <p class="forget">¿Olvidaste la contra? <a href="">Click aqui</a></p>
                        <p class="forget">¿No tienes una cuenta? <a href="./registro.php">Click aqui</a></p>



                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="/js/main.js"></script>
</body>

</html>