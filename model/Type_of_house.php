<?php
    require_once "Conection.php";

    class Type_of_house
    {
        private static $conexion;
        private static $typeHouses = array();

        public static function getConexion(){
            self::$conexion = Conection::conectar();
        }

        public static function getTypeHouse(){
            self::getConexion();

            $query = "SELECT *  FROM type_of_houses";

            $type = mysqli_query(self::$conexion, $query);

            while ($fila = $type->fetch_assoc()) {
                self::$typeHouses[]=$fila;
            }     
            return self::$typeHouses;   
        }        
    }
?>