<?php
    header('Access-Control-Allow-Origin: *');
    $mysqli = new mysqli('localhost', 'root', '', 'finalproject', 3306);
    $mysqli->set_charset('utf8');
?>