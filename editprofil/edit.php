<?php
require_once "../core/database.php";
require_once "../core/function.php";
cekSesi("../login.php");

$con = new Database();

if(isset($_POST['password2'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    $nick_name = htmlspecialchars($_POST['nick_name']);
    $profile_img = htmlspecialchars($_POST['profile_img']);
    $query = "
        UPDATE user SET username = '$username', 
        password = '$password', current_password = '$password2', nick_name = '$nick_name',
        profile_image = $profile_img WHERE user_id = {$_SESSION['trainkey_id']}" ;
    $con->query($query);
    $user = $con->execute();
    if($con->rowCount()==1){
        echo json_encode("Berhasil");
    }
    else if($con->rowCount() < 1){
        echo json_encode("Tidak ada data yang diubah");
    }
    else if($con->rowCount() != 1){
        echo json_encode("Gagal");
    }
}

?>