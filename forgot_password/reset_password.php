<?php

session_start();

if(!isset($_SESSION['reset_password'])){
    header("Location: ../");
}
else if(isset($_SESSION['reset_password'])){

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    
    <link rel="icon" type="image/x-icon" href="https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/img/logo.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <p class="notify" id="notify">Notify</p>

    <!-- Navbar -->
    <div class="nav">
        <a href="https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/" class="brand">
            <img src="../img/logo.png" alt="" width="70px">
            <h1>Train Key</h1>
        </a>
    </div>
    <!-- End Navbar -->

    <div class="login-container">
        <div class="card-container">
            <h1>New Password</h1>
            <form class="form-container">
                <div class="form-content">
                    <label for="password">New password</label>
                    <input type="text" name="password" id="password" autocomplete="off" required="" minlength="8" autofocus placeholder="Type here...">
                </div>
                <div class="form-content">
                    <label for="password2">Retype password</label>
                    <input type="text" name="password2" id="password2" autocomplete="off" required="" autofocus placeholder="Type here...">
                    <span style="color:red; font-size: 12px;">* Setiap spasi akan dihapus</span>
                </div>
            </form>
            <button type="button" id="simpanbtn">Simpan</button>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/function.js"></script>
    <script src="js/reset.js"></script>
</body>