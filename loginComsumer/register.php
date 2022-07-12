<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    include("../sql.php");

    if (isset($_REQUEST["inputEmail"])){
        
        $inputEmail = $_REQUEST['inputEmail'];
        $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $firstname = $_REQUEST['inputFirstname'];
        $lastname = $_REQUEST['inputLastname'];
        $tel= $_REQUEST['phoneNumber'];
        $reschknumber= $_REQUEST['reschknumber'];
        
        try{
            $sql = "INSERT INTO usermember (email,`password`,firstName,lastName,tel) VALUES " .
            "('{$inputEmail}','{$password}','{$firstname}','{$lastname}','{$tel}')";
        if ($mysqli->query($sql)){

            echo "註冊成功!";
        }else{
            echo "此帳號已註冊!";

        }
        }catch(Exception $e){

            echo "something wrong or 此帳號已註冊!";
    
        }

    }


?>