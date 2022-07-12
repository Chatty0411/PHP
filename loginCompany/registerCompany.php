<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    include("../sql.php");

    if (isset($_REQUEST["companyInputEmail"])){
        
        $inputEmail = $_REQUEST['companyInputEmail'];
        $password = password_hash($_REQUEST['companyPasswd'], PASSWORD_DEFAULT);
        $name = $_REQUEST['companyName'];
        $addr = $_REQUEST['companyAddr'];
        $tel= $_REQUEST['companyTel'];
        $reschknumber= $_REQUEST['companyReschknumber'];
        

        try{
            $sql = "INSERT INTO restaurant (email,`password`,`name`,`address`,tel) VALUES " .
            "('{$inputEmail}','{$password}','{$name}','{$addr}','{$tel}')";
        if ($mysqli->query($sql)){
            // echo var_dump($mysqli->query($sql));
            // header("Location: http://localhost:3000/login3");
            echo "註冊成功!";
        }else{
            echo "此帳號已註冊!";
            // echo "ERROR: " . $sql;
            // header("Location: www.google.com");
        }
        }catch(Exception $e){
            // header("Location: http://localhost:3000/register");
            // ob_flush();
            // flush();
            // sleep(2);
            echo "something wrong or 此帳號已註冊!";

        }
    }


?>