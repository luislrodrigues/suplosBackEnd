<?php
    include "model/My_good.php";

    class MyGoodController {

        public static function getMyGood(){
            try {
                return My_good::getMyGood();
                
            } catch (\Throwable $e) {
                $e->getMessage();
            }
        }
    }
?>