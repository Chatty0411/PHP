<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
    $mysqli = new mysqli('localhost', 'root', '', 'finalproject', 3306);
    $mysqli->set_charset('utf8');

    spl_autoload_register(function($className) {
        require_once $className . '.php';
    });

    // 接收參數
    $input = file_get_contents("php://input"); //接收POST資料
    // $xml = simplexml_load_string($input); //提取POST資料為simplexml物件
    // $output = $input->data;

    $output = json_decode($input);
    // var_dump($input);
    // echo($output->menuItemId);
    // var_dump($output);
    if($output->menuItemId){
        $menuItemId = $output->menuItemId;
        $restaurantId = $output->restaurantId;
        $restaurantName = $output->restaurantName;
        $dish = $output->dish;
        $type = $output->type;
        $picture = $output->picture;
        $cost = $output->cost;
        $mount = $output->mount;

        // $menuItemId = 1;
        // $restaurantId = 2;
        // $restaurantName = 3;
        // $dish = 4;
        // $type = 5;
        // $picture = 6;
        // $cost = 7;
        // $mount = 1;
        // var_dump($_REQUEST);


        $sql ="INSERT INTO `carts`
            ( `menuItemId`, `restaurantId`, `restaurantName`, `dish`, `type`, `picture`, `cost`, `mount`) 
            VALUES ('{$menuItemId}','{$restaurantId}','{$restaurantName}','{$dish}','{$type}}','{$picture}','{$cost}','{$mount}')";

        $mysqli->query($sql);
    }

    
?>