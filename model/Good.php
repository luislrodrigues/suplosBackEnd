<?php
    require_once "Conection.php";

    class Good
    {
        private static $conexion;
        private static $goods = array();

        public static function getConexion(){
            self::$conexion = Conection::conectar();
        }

        public static function getGood(){
            self::getConexion();

            $query = "SELECT g.id, g.address, g.phone, g.postal_code, g.price, c.city, t.house 
                    FROM goods AS g INNER JOIN cities AS c ON g.id_city = c.id 
                    INNER JOIN type_of_houses AS t ON g.id_tipo = t.id";

            $good = mysqli_query(self::$conexion, $query);

            while ($fila = $good->fetch_assoc()) {
                self::$goods[]=$fila;
            }     
            return self::$goods;   
        } 
        
        public static function saveGood($id){            
            self::getConexion();
            if (self::validateGood($id) == false) {
                $query = "INSERT INTO my_goods (id, id_good) VALUES (NULL, $id)";
                $good = mysqli_query(self::$conexion, $query);
                if ($good) {
                    return true;
                }
            }
            return false;           
        }  

        public static function validateGood($id){            
            self::getConexion();           
            $query = "SELECT * FROM my_goods WHERE id_good = $id";
            $good = mysqli_query(self::$conexion, $query);
            if (mysqli_num_rows($good) > 0) {
                return true;
            }
            return false;
        }  

        public static function searchGood($id_city, $id_type){
            self::getConexion();

            $query = "SELECT g.id, g.address, g.phone, g.postal_code, g.price, c.city, t.house 
                    FROM goods AS g INNER JOIN cities AS c ON g.id_city = c.id 
                    INNER JOIN type_of_houses AS t ON g.id_tipo = t.id
                    WHERE g.id_city = $id_city AND g.id_tipo = $id_type";

            $good = mysqli_query(self::$conexion, $query);

            while ($fila = $good->fetch_assoc()) {
                self::$goods[]=$fila;
            }     
            return self::$goods;   
        } 
    }
?>