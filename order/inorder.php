<?php 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
    $mysqli = new mysqli('localhost', 'root', '', 'finalproject', 3306);
    $mysqli->set_charset('utf8');

    spl_autoload_register(function($className) {
        require_once $className . '.php';
    });

    $input = file_get_contents("php://input");
    $output = json_decode($input);

    $restaurantId = $output->restaurantId;
    $uid = $output->uid;
    $cost = $output->cost;
    $freight = $output->freight;
    $orderdetails = $output->orderdetails;

    // echo $cost;

    // orderdetails為 array裡面有object
    // foreach($orderdetails as $value){
    //     var_dump ($value->id);
    // }

    // id流水號//流水沒重複//
    $idrand=''; $numend=0; $temp='';

    /// 當沒有流水號或流水號重覆時重新產生流水號
    while( !$idrand || $numend !=0){
        $idrand = time();
        // echo $idrand . "<br />"; 
        $temp = $idrand;
        $sql = "SELECT orderId FROM `ordert` WHERE orderId = '{$temp}'";
        $result = $mysqli->query($sql);
        // echo $result;
        $numend = $result->num_rows;
    }
    

    // 有流水號後資料進訂單資料表(ordert)流水號// 餐廳流水號 //會員流水號// 單價// 運費  =>除流水號外其他須接受參數   
    $sql = "INSERT INTO `ordert`( `orderId`,`restaurantId`, `uId`, `cost`, `freight`) 
    VALUES ($temp, $restaurantId, $uid, $cost, $freight)";
    $result=$mysqli->query($sql);

    // // 找出此筆流水號
    // $sql = "SELECT * FROM `ordert` WHERE orderId = $temp ";
    // $result=$mysqli->query($sql);
    // $data = $result->fetch_object();

    // $finaldata = json_encode($data);


    // orderdetails為 array裡面有object
    foreach($orderdetails as $value){
        // echo (($value->cost)*($value->mount));
        // 將流水號輸入訂單明細表(orderdetails) =>如果有多筆dish用while迴圈
        $sql = "INSERT INTO `orderdetails`( `orderId`, `dish`, `amount`, `cost`) 
        VALUES ($temp, '$value->dish', '$value->mount', ($value->cost)*($value->mount))";
        $result=$mysqli->query($sql);
        // echo $result;
    }



    // // 將流水號輸入訂單明細表(orderdetails) =>如果有多筆dish用while迴圈
    // $sql = "INSERT INTO `orderdetails`( `orderId`, `dish`, `amount`, `cost`) 
    // VALUES ($temp,'珍珠奶茶',1,75)";
    // $result=$mysqli->query($sql);

    // $sql = "INSERT INTO `orderdetails`( `orderId`, `dish`, `amount`, `cost`) 
    // VALUES ($temp,'紅茶拿鐵',3,55)";
    // $result2=$mysqli->query($sql);

    // $finalresult = json_encode($result);
    // $finalresult2 = json_encode($result2);
    // echo "finaldata:$finaldata<br />"; 
    // // echo "finaldata:$finaldata<br />  finalresult:$finalresult<br />finalresult2:$finalresult2";



    // $temp要傳送到

    // header("Location: http://localhost:3000/payment")
?>

