<?php

require_once "../core/database.php";
session_start();


$con = new Database();
if(isset($_POST['username'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $remember = $_POST['remember'];

    $lanjut = "false";
    
    if(strlen($username)<=0){
        echo json_encode("Username kosong");
    }
    else if(strlen($password)<=0){
        echo json_encode("Password kosong");
    }
    else if(strlen($username)>0 && strlen($password)>0){
        $lanjut = "true";
    }
    
    
    if($lanjut == "true"){
        $query = "SELECT * FROM user WHERE username = '{$username}'";
        $con->query($query);
        $res = $con->getSingle();
        if($con->rowCount()==1){
            if($password == $res['password']){
                if($remember != "false"){
                    setcookie('username',$username, time()+3600,'/');
                    setcookie('password',$password, time()+3600,'/');
                }
                
                $_SESSION['usertrainkey'] = $res['username'];
                $_SESSION['trainkey_id'] = $res['user_id'];
                echo json_encode("berhasil");
            }else if($password != $res['password']){
                echo json_encode("Password salah");
            }
        }
        else{
            echo json_encode("User tidak ditemukan");
        }
    }
}

?>