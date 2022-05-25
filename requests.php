<?php
    header("Content-type: application/json");
    include "controllers/CityController.php";
    include "controllers/TypeHouseController.php";
    include "controllers/GoodController.php";
    include "controllers/MyGoodController.php";

    $url = $_SERVER["REQUEST_URI"];   
    $arrayUrl = explode('?', $url);
    
    $CaM = $arrayUrl[count($arrayUrl) - 1];
    $arrayCaM = explode('=', $CaM);

    $controlador = $arrayCaM[0];
    $metodo = $arrayCaM[1];

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        switch ($controlador."=".$metodo) {
            case "c=gc":
                if( $cities = CityController::getCities()){                        
                    echo  json_encode($cities);
                }else{
                    echo json_encode([]);
                }
                break;
            case "t=gt":
                if( $type = TypeHouseController::getTypeHouse()){                        
                    echo json_encode($type);
                }else{
                    echo json_encode([]);
                }
                break;
            case "g=gd":
                if( $type = GoodController::getGood()){                        
                    echo json_encode($type);
                }else{
                    echo json_encode([]);
                }
                break;
            case "m=gd":
                if( $type = MyGoodController::getMyGood()){                        
                    echo json_encode($type);
                }else{
                    echo json_encode([]);
                }
                break;
        }       
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        switch ($controlador."=".$metodo) {
            case "g=sg":
                if( $type = GoodController::saveGood($_POST["id"])){    
                    echo json_encode(true);
                }else{
                    echo json_encode(false);
                }
                break;
            case "g=sb":
                if( $type = GoodController::searchGood($_POST["city"], $_POST["type"])){    
                    echo json_encode($type);
                }else{
                    echo json_encode([]);
                }
                break;
        }       
    }
?>