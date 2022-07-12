<?php
    include('../sql.php');

    spl_autoload_register(function($className) {
        require_once $className . '.php';
    });

    $sql = "SELECT * FROM carts ";

    $result=$mysqli->query($sql);
    $data = $result->fetch_object();

    $dataarray = array();

    while ($cart = $result->fetch_object()){
        $dataarray[] = $cart;
    //     echo "{$menu->menuItemId}<br />";
    //     echo "{$menu->restaurantId}<br />";
    //     echo "{$menu->dish}<br />";
    //     echo "{$menu->type}<br />";
    //     echo "{$menu->introduce}<br />";
    //     echo "{$menu->picture}<br />";
    //     echo "{$menu->cost}<br />";
    //     echo "<hr />";
    }
    $finaldata = json_encode($dataarray);
    echo ($finaldata);
?>