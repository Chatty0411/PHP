<?php
    include('../sql.php');

    spl_autoload_register(function($className){
        require_once $className . '.php';
    });
    session_start();

    if (!isset($_REQUEST['inputEmail'])) header("Location: http://localhost:3000/");

    $inputEmail = $_REQUEST['inputEmail']; $passwd = $_REQUEST['inputPassword'];
    $sql = "SELECT * FROM usermember WHERE email = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $inputEmail);
    $stmt->execute();

    $result = $stmt->get_result();
    $finalresult = -1;

    if ($result->num_rows > 0){
        $member = $result->fetch_object();
        // var_dump($member);
        if (password_verify($passwd, $member->password)){
            //密碼正確
            // $_SESSION['member'] = $member;
            $s = json_encode($member);
            $uId = $member->uid;
            $finalresult =$uId;
            echo $s;
        }else{
            echo $finalresult;
            // echo "密碼錯誤 or something wrong";
            // header("Location: login.php");
        }
    }else{
        echo $finalresult;
        // echo "無此帳號";
        // header("Location: login.php");
    }
?>