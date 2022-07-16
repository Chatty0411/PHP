<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

// print_r(var_dump($_POST));
// $_POST = json_decode(file_get_contents("php://input"),true);
// echo $_POST[0];
// $array1 = array();
// $_POST = file_get_contents("php://input");

// $array1[] = $_POST;

// var_dump($_POST)
// var_dump($array1[0][0]);

$_POST = json_decode(file_get_contents("php://input"),true);
echo $_POST['data1'];
?>