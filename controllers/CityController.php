<?php
    include "model/City.php";

    class CityController {

        public static function getCities(){
            try {
                return City::getCities();
                
            } catch (\Throwable $e) {
                $e->getMessage();
            }
        }
    }
?>