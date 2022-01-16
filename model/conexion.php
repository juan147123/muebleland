<?php
class Conexion{
    public static function conectar()
        {
            $host = 'localhost';
            $db = 'bd_muebleland';
            $user = 'root';
            $pass = '';
            

            $cadena = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';  
            try{
                $conect = new PDO($cadena,$user,$pass);
                $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conect;
            }catch(PDOException $e){
                $conect = 'Error de Conexion';
                echo "Error ". $e->getMessage();
            }
        }
}