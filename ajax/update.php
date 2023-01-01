<?php

require_once "../core/database.php";
$db = new Database();
session_start();
// mysqli_connect();



if(isset($_POST['update'])){
    $query = "UPDATE poin 
        SET high_poin = {$_POST['highpoin']},
        tanggal = NOW()
        WHERE user_id = {$_POST['user_id']}";
    $db->query($query);
    $db->execute();

    $query = "SELECT * FROM poin where user_id = {$_POST['trainkey_id']}";
    $db->query($query);
    echo json_encode($db->getSingle());
}
else if(!isset($_POST['update'])){
    $query = "SELECT * FROM poin where user_id = 1";
    $db->query($query);
    echo json_encode($db->getSingle());
}

?>