<?php

require_once "../core/database.php";
$db = new Database();

// $_POST['upload']='true';
// $_POST['id']=1;

if(isset($_POST['upload'])){
    $query = "UPDATE user2 SET poin = {$_POST['highpoin']} WHERE id = '{$_POST['id']}'";
    $db->query($query);
    echo json_encode($db->getSingle());
    
    return true;
}
if(isset($_GET['upload'])){
    return false;
}

?>