<?php
    require_once "Conection.php";

    class City
    {
        private static $conexion;
        private static $cities = array();

        public static function getConexion(){
            self::$conexion = Conection::conectar();
        }

        public static function getCities(){
            self::getConexion();

            $query = "SELECT *  FROM cities";

            $city = mysqli_query(self::$conexion, $query);

            while ($fila = $city->fetch_assoc()) {
                self::$cities[]=$fila;
            }     
            return self::$cities;            
        }        
    }
?>