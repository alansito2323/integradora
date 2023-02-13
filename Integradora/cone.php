<?php 

    require_once $_SERVER['DOCUMENT_ROOT']."/Integradora/Integradora/vendor/autoload.php";

    class cone{
        public  function conectar()
        {
            try {

                $bd = "login2";
                $cadenacone = "mongodb+srv://alansito23:bpbtDQFDetLGdjUi@atlascluster.4akropr.mongodb.net/login2?retryWrites=true&w=majority";
                $cliente = new MongoDB\Client($cadenacone);
                return $cliente->selectDatabase($bd);
            } catch (\Throwable $th) {
            return $th->getMessage();
            }
       
        }

    }
?>