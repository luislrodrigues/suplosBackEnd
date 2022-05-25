<?php
    include "model/Type_of_house.php";

    class TypeHouseController {

        public static function getTypeHouse(){
            try {
                return Type_of_house::getTypeHouse();
                
            } catch (\Throwable $e) {
                $e->getMessage();
            }
        }
    }
?>