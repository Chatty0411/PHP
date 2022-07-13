<?php 
    include('../sql.php');

    spl_autoload_register(function($className) {
        require_once $className . '.php';
    });

    // id流水號//流水沒重複//
    $idrand=''; $numend=0; $temp='';

    /// 當沒有流水號或流水號重覆時重新產生流水號
    while( !$idrand || $numend !=0){
        $idrand = rand(1,1000). rand(1,1000);
        // echo $idrand . "<br />"; 
        $temp = $idrand;
        $sql = "SELECT orderId FROM `order` WHERE orderId = '{$temp}'";
        $result = $mysqli->query($sql);
        // echo $result;
        $numend = $result->num_rows;
    }
    

    // 有流水號後資料進訂單資料表(order)流水號// 餐廳流水號 //會員流水號// 單價// 運費  =>除流水號外其他須接受參數   
    $sql = "INSERT INTO `order`( `orderId`,`restaurantId`, `uId`, `cost`, `freight`) 
    VALUES ($temp, 2, 12, 215, 20)";
    $result=$mysqli->query($sql);

    // 找出此筆流水號
    $sql = "SELECT * FROM `order` WHERE orderId = $temp ";
    $result=$mysqli->query($sql);
    $data = $result->fetch_object();

    $finaldata = json_encode($data);

    // 將流水號輸入訂單明細表(orderdetails) =>如果有多筆dish用for迴圈
    $sql = "INSERT INTO `orderdetails`( `orderId`, `dish`, `amount`, `cost`) 
    VALUES ($temp,'珍珠奶茶',1,75)";
    $result=$mysqli->query($sql);

    $sql = "INSERT INTO `orderdetails`( `orderId`, `dish`, `amount`, `cost`) 
    VALUES ($temp,'椰果奶茶',2,60)";
    $result2=$mysqli->query($sql);

    $finalresult = json_encode($result);
    $finalresult2 = json_encode($result2);
    echo "finaldata:$finaldata<br />"; 
    // echo "finaldata:$finaldata<br />  finalresult:$finalresult<br />finalresult2:$finalresult2";

?>