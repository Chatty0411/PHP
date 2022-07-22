<?php
// header('Access-Control-Allow-Origin: http://localhost:3000');
// header('Access-Control-Allow-Methods:POST,GET,OPTIONS,PUT');
// header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With,X-PINGOTHER,Content-Type');
include "../serverHeader.php";
include "../sql.php";


$restJson = file_get_contents("php://input");
$_POST = json_decode($restJson, true);
if ($_POST) {
    $state = $_POST['state'];
    // $state = $_REQUEST['state'];
    // echo $state;
    $id = $_POST['id'];
    // $id = $_REQUEST['id'];
    // echo $id;

    $sql = "UPDATE proposal SET state = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $state, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo $result;
}
