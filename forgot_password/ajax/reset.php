<?php

session_start();
require_once "../../core/database.php";

$con = new Database();

if(isset($_POST['reset_password'])){
    $user_id = $_SESSION['user_id'];
    $passwordBaru = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM user WHERE user_id = $user_id";
    $con->query($query);
    $res = $con->getSingle();

    $passwordLama = $res['password'];
    // echo json_encode($passwordLama);
    
    $query = "UPDATE user SET password = '$passwordBaru', current_password = '$passwordLama' WHERE user_id = $user_id";
    $con->query($query);
    $con->execute();

    if($con->rowCount() == 1){
        $_SESSION = [];
        session_unset();
        session_destroy();

        echo json_encode("berhasil");
    }
    else if($con->rowCount() == 0){
        echo json_encode("Password tidak berubah");
    }
    else{
        echo json_encode("gagal");
    }
}

?>