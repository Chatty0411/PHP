<?php
    header('Access-Control-Allow-Origin: *');
    // if (!isset($_GET['account'])) echo -1;
    if (!isset($_POST['account'])) echo -1;

    include("../sql.php");
    // $account = $_GET['account'];
    $account = $_POST['account'];
    $sql = "SELECT account FROM member WHERE account = '{$account}'";
    $result = $mysqli->query($sql);

    // echo $result->num_rows;
    $numend = $result->num_rows;

    if($numend == 0){
        echo "帳號可以";
    }
    else{
        echo "帳號重複!!!!!";
    }
?>