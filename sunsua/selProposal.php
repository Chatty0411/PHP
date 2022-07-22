<?php
// header('Access-Control-Allow-Origin: * ');
// // header('Access-Control-Allow-Origin: http://localhost:3000');
// header('Access-Control-Allow-Methods:POST,GET,OPTIONS');
// header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With,X-PINGOTHER,Content-Type');
date_default_timezone_set('Asia/Taipei');
include "../serverHeader.php";
include "../sql.php";

$sql =  "SELECT * FROM proposal WHERE state = 1 ;";
// $result = $mysqli->query($sql);
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data = array();
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            $row->limitTime = limitTime_strtoTime($row->limitTime);
            $row->setTime = strtotime($row->setTime); // 出來是sec
            $row->setTime = $row->setTime * 1000; // 轉換成ms
            $data[] = $row;
        }
    }
}

$dataToClient = json_encode($data);
echo $dataToClient;


/* function */
function limitTime_strtoTime($str)
{
    $NewString = explode(":", $str, 3);
    $hr = $NewString[0];
    $min = $NewString[1];
    $sec = $NewString[2];
    $ms = ($hr * 3600 + $min * 60 + $sec) * 1000;
    return $ms;
}
