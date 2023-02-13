<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sytle.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Baby Fresh</title>
    <style>


    </style>
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
                    <h2>Registro de sesion</h2>
                    
                    <?php
                    if (isset($_SESSION['err'])) {
                        $answer = $_SESSION['err']; ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: '<?php echo $answer;?>',
                                text: 'Intenta con otro username'
                                
                            })
                        </script>
                    <?php
                        unset($_SESSION['err']);
                    }
                    ?>
                    <form action="./insert.php" method="post">

                        <div class="inputBox">
                            <input type="text" placeholder="Usuario" required class="form-control" id="username" name="username">
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Contraseña" required class="form-control" id="password" name="password">
                        </div>
                        <div class="middle">
                            <center><button class="btn btn1"><i class="fa-solid fa-floppy-disk"></i> Registrarse</button></center>
                        </div>
                        <p class="forget">¿Quieres inicar sesion? <a href="./inciarsesion.php">Click aqui</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>