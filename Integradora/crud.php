<?php

class Crud extends cone
{
    public function show()
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->usuarios;
            $datos = $coleccion->find();
            return $datos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function show2($padre)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->bebes;
            $datos = $coleccion->find(['user_padre' => $padre]);
            return $datos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function pon($datos)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->usuarios;
            $respuesta = $coleccion->insertOne($datos);
            return $respuesta;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function pon2($datos)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->bebes;
            $respuesta = $coleccion->insertOne($datos);
            return $respuesta;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function obten($id)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->usuarios;
            $datos = $coleccion->findOne(
                array(
                    '_id' => new MongoDB\BSON\ObjectId($id)
                )
            );
            return $datos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function obten2($id)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->bebes;
            $datos = $coleccion->findOne(
                array(
                    '_id' => new MongoDB\BSON\ObjectId($id)
                )
            );
            return $datos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function quita($id)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->usuarios;
            $respuesta = $coleccion->deleteOne(
                array(
                    '_id' => new MongoDB\BSON\ObjectId($id)
                )
            );
            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function quita2($id)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->bebes;
            $respuesta = $coleccion->deleteOne(
                array(
                    '_id' => new MongoDB\BSON\ObjectId($id)
                )
            );
            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function editar($id, $datos)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->usuarios;
            $respuesta = $coleccion->updateOne(

                ['_id' => new MongoDB\BSON\ObjectId($id)],
                [
                    '$set' => $datos
                ]

            );
            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function editar2($id, $datos)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->bebes;
            $respuesta = $coleccion->updateOne(

                ['_id' => new MongoDB\BSON\ObjectId($id)],
                [
                    '$set' => $datos
                ]

            );
            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function checa($username, $password)
    {
        try {
            $cone = parent::conectar();
            $coleccion = $cone->usuarios;
            $query = array('username' => $username, 'password' => md5($password));
            $respuesta = $coleccion->findOne($query);

            if (empty($respuesta)) {
                return false;
            }

            $_SESSION['user_id'] = $respuesta['_id'];
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function inicio()
    {
        return isset($_SESSION['user_id']);
    }

    public function cerrar()
    {
        unset($_SESSION['user_id']);
    }
}
