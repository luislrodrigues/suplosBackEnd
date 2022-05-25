<?php
    require_once "Conection.php";

    class My_good
    {
        private static $conexion;
        private static $my_goods = array();

        public static function getConexion(){
            self::$conexion = Conection::conectar();
        }

        public static function getMyGood(){
            self::getConexion();

            $query = "SELECT *  FROM my_goods AS my 
                    INNER JOIN goods AS g ON my.id_good = g.id 
                    INNER JOIN cities AS c ON g.id_city = c.id 
                    INNER JOIN type_of_houses AS t ON g.id_tipo = t.id";

            $myGood = mysqli_query(self::$conexion, $query);

            while ($fila = $myGood->fetch_assoc()) {
                self::$my_goods[]=$fila;
            }     
            return self::$my_goods;
        }        
    }
?>