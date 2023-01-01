<?php

require_once "../../core/function.php";
require_once "../../core/database.php";
sesiLogin();

$con = new Database();

if(isset($_POST['cekusername'])){
    $username = htmlspecialchars($_POST['username']);
    $query = "SELECT * FROM user WHERE username = '$username'";
    $con->query($query);
    $con->execute();
    if($con->rowCount()==0){
        echo json_encode("Data tidak ditemukan");
    }
    else if($con->rowCount()==1){
        echo json_encode("Data ditemukan");
    }
    else{
        echo json_encode("Gagal mencari username");
    }
}

else if(!isset($_POST['cekusername'])){
    header("Location: ../");
}

?>