<?php

session_start();
require_once "../core/database.php";
require_once "../core/function.php";
sesiLogin();
$con = new Database();

if(isset($_POST['password2'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    $nick_name = htmlspecialchars($_POST['nick_name']);
    $profile_image = htmlspecialchars($_POST['profile_img']);

    $query = "SELECT * FROM user";
    $con->query($query);
    $users = $con->getAssoc();
    

    foreach($users as $us){
        if($us['username'] != $username){
            $lanjut = "true";
        }
        else if($us['username'] == $username){
            echo json_encode("Username sudah ada");
            $lanjut = "false";
            break;
        }
    }
    
    if($lanjut=="true"){
        if($password!=$password2){
            echo json_encode("Password tidak sama");
        }
        else if($password==$password2){
            $query = "INSERT INTO user(username, password, current_password, nick_name, profile_image, last_login) VALUES ('$username','$password','$password2','$nick_name','$profile_image',NOW())";
            $con->query($query);
            $con->execute();
            if($con->rowCount()==1){
                $query = "SELECT * FROM user WHERE username = '$username'";
                $con->query($query);
                $user = $con->getSingle();

                $query = "insert into poin(user_id,high_poin,tanggal) VALUES ({$user['user_id']},0,NOW())";
                $con->query($query);
                $con->execute();
                echo json_encode("Berhasil");
            }
            else{
                echo json_encode("Gagal mendaftar");
            }
        }
    }
}

?>
