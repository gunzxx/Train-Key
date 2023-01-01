<?php

require_once "../core/function.php";
// cekSesi("../");
sesiLogin();

// var_dump($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/img/logo.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="forgot.css">
</head>
<body>
    <!-- Navbar -->
    <div class="nav">
        <a href="https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/" class="brand">
            <img src="../img/logo.png" alt="" width="70px">
            <h1>Train Key</h1>
        </a>
    </div>
    <!-- End Navbar -->

    <p class="notify" id="notify">NOTIFY</p>
    <div class="login-container">
        <div class="card-container">
            <!-- <h1>Login</h1> -->
            <form class="form-container">
                <div class="form-content" id="form-username">
                    <label for="username">Masukkan username kamu :</label>
                    <input type="text" name="username" style="text-align: center;" id="username" autocomplete="off" required="" autofocus placeholder="username">
                </div>
                <div class="form-content" id="form-password">
                    <label style="font-size: 12px; text-align :center;" for="password">Masukkan password yang kamu pakai sebelumnya :</label>
                    <input type="text" name="password" style="text-align: center;" id="password" autocomplete="off" required="" autofocus placeholder="password">
                </div>
            </form>
            <button name="send" type="button" id="sendbtn">Send</button>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/function.js"></script>
    <script src="js/user.js"></script>
</body>
</html>

