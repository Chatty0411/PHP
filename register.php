<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    include("sql.php");

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
            
            
            // echo "here";
            
            
        }

        

    }


?>