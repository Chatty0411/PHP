<?php
// header('Access-Control-Allow-Origin: http://localhost:3000');
// header('Access-Control-Allow-Methods:POST,GET,OPTIONS');
// header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With,X-PINGOTHER,Content-Type');
include "../serverHeader.php";
include "../sql.php";

$restJson = file_get_contents("php://input");
$_POST = json_decode($restJson, true);
if ($_POST) {
    $proposalId = $_POST['proposalId'];
    $uidPartyB = $_POST['uidPartyB'];
    $count = $_POST['count'];
    // $freight = $_POST['freight'];
    $freight = 60;

    $sql = "INSERT INTO sunsua_order 
            (id, proposalId	, uidPartyB, count,freight,state) 
            VALUES (NULL, ?, ?, ?, ?, '未結帳' );";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param(
        'ssss',
        $proposalId,
        $uidPartyB,
        $count,
        $freight,
    );
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        echo $result;
    } else {
        echo "no result";
    }
} else {
    echo ("NO POST<br/>\n");
}
