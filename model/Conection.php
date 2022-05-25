<?php

    class Conection
    {   
        public static function conectar(){
            try {
                include "./config/database.php";

                $conexion = mysqli_connect($config["host"], $config["user"], $config["pass"], $config["database"] );
                
                if (!$conexion) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                return $conexion;

            }catch(\Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>