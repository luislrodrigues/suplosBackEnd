<?php
    include "model/Good.php";

    class GoodController {

        public static function getGood(){
            try {
                return Good::getGood();
                
            } catch (\Throwable $e) {
                $e->getMessage();
            }
        }

        public static function saveGood($id){
            try {
                return Good::saveGood($id);
                
            } catch (\Throwable $e) {
                $e->getMessage();
            }
        }

        public static function searchGood($id_city, $id_type){
            try {
                return Good::searchGood($id_city, $id_type);
                
            } catch (\Throwable $e) {
                $e->getMessage();
            }
        }
    }
?>