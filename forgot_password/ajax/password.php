<?php

require_once "../../core/function.php";
require_once "../../core/database.php";
sesiLogin();

$con = new Database();

if(isset($_POST['cekpassword'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $query = "SELECT * FROM user WHERE username = '$username' AND current_password = '$password'";
    $con->query($query);
    $res = $con->getSingle();
    if($con->rowCount()==1){
        echo json_encode("lanjut");
        $_SESSION['reset_password'] = "true";
        $_SESSION['user_id'] = $res['user_id'];
    }
    else if($con->rowCount()<=0){
        echo json_encode("Current password salah");
    }
    else if($con->rowCount()!=1){
        echo json_encode("Current password salah");
    }
}


?>