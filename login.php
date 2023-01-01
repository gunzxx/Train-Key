<?php

// session_start();
require_once "core/function.php";
require_once "core/database.php";
sesiLogin();
$con = new Database();

// var_dump($_COOKIE);

if(isset($_COOKIE['username'])){
    if($_COOKIE['username']!=""){
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];

        $query = "SELECT * FROM user WHERE username = '$username'";
        $con->query($query);
        $res = $con->getSingle();
        if($con->rowCount()==1){
            if($password == $res['password']){
                $_SESSION['usertrainkey'] = $res['username'];
                $_SESSION['trainkey_id'] = $res['user_id'];
                header("Location: http://localhost/10%20Projek%202/");
                // echo json_encode("berhasil");
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Trainkey</title>
    <link rel="icon" type="image/x-icon" href="https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/img/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <p class="notify" id="notify">
        Notify
    </p>

    <!-- Navbar -->
    <div class="nav">
        <a href="" class="brand">
            <img src="img/logo.png" alt="" width="70px">
            <h1>Train Key</h1>
        </a>
        <div class="sub-nav">
            <a class="nav-list">
                <p>Help & Support</p>
            </a>
            <a class="nav-list">
                <p>Documentation</p>
            </a>
        </div>
    </div>
    <!-- End Navbar -->


    <div class="login-container">
        <div class="card-container">
            <h1>Login</h1>
            <form class="form-container">
                <div class="form-content username">
                    <label for="username">Username 
                    </label>
                    <input type="text" name="username" id="username" autocomplete="off" required="" autofocus placeholder="Masukkan username">
                </div>
                <div class="form-content password">
                    <label for="password">Password 
                    </label>
                    <input type="password" name="password" id="password" autocomplete="off" require="" placeholder="Masukkan password">
                    <img style="color: red;" src="img/eye-fill.svg" id="showpassword">
                </div>
                <div class="form-content remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">remember me</label>
                </div>
            </form>
            <legend>
                <a href="register.php" class="daftar">Tidak punya akun?</a>
                <a href="forgot_password" class="forgot">Lupa password?</a>
            </legend>
            <button type="button" id="login">Login</button>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>