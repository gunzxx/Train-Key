<?php

require_once "../core/database.php";
$db = new Database();

if(isset($_POST['update'])){
    $query = "UPDATE user 
        SET poin = {$_POST['highpoin']},
        tanggal = NOW()
        WHERE id = '{$_POST['id']}'";
    $db->query($query);
    $db->execute();
    
    return true;
}

?>