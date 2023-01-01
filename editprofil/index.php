<?php
require_once "../core/database.php";
require_once "../core/function.php";
cekSesi("../login.php");

$con = new Database();

$query = "SELECT * FROM user WHERE user_id = '{$_SESSION['trainkey_id']}';";
$con->query($query);
$user = $con->getSingle();

// var_dump($user);
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
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <p class="notify" id="notify">Notify</p>

    <!-- Navbar -->
    <!-- <?=__DIR__ ?> -->
    <div class="nav">
        <a href="../" class="brand">
            <img src="../img/logo.png" alt="" width="70px">
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
            <h1>Edit Profil</h1>
            <form class="form-container">
                <fieldset class="form-profile">
                    <legend>Pilih foto profil : </legend>
                    <label for="profile1">
                        <input type="radio" name="profile" id="profile1" value="1">
                        <img class="profile-img" src="../img/pfp/pfp1.png">
                    </label>
                    <label for="profile2">
                        <input type="radio" name="profile" id="profile2" value="2">
                        <img class="profile-img" src="../img/pfp/pfp2.png">
                    </label>
                    <label for="profile3">
                        <input type="radio" name="profile" id="profile3" value="3">
                        <img class="profile-img" src="../img/pfp/pfp3.png">
                    </label>
                    <label for="profile4">
                        <input type="radio" name="profile" id="profile4" value="4">
                        <img class="profile-img" src="../img/pfp/pfp4.png">
                    </label>
                    <label for="profile5">
                        <input type="radio" name="profile" id="profile5" value="5">
                        <img class="profile-img" src="../img/pfp/pfp5.png">
                    </label>
                    <label for="profile6">
                        <input type="radio" name="profile" id="profile6" value="6">
                        <img class="profile-img" src="../img/pfp/pfp6.png">
                    </label>
                    <label for="profile7">
                        <input type="radio" name="profile" id="profile7" value="7">
                        <img class="profile-img" src="../img/pfp/pfp7.png">
                    </label>
                    <label for="profile8">
                        <input type="radio" name="profile" id="profile8" value="8">
                        <img class="profile-img" src="../img/pfp/pfp8.png">
                    </label>
                    <label for="profile9">
                        <input type="radio" name="profile" id="profile9" value="9">
                        <img class="profile-img" src="../img/pfp/pfp9.png">
                    </label>
                    <label for="profile10">
                        <input type="radio" name="profile" id="profile10" value="10">
                        <img class="profile-img" src="../img/pfp/pfp10.png">
                    </label>
                    <label for="profile11">
                        <input type="radio" name="profile" id="profile11" value="11">
                        <img class="profile-img" src="../img/pfp/pfp11.png">
                    </label>
                    <label for="profile12">
                        <input type="radio" name="profile" id="profile12" value="12">
                        <img class="profile-img" src="../img/pfp/pfp12.png">
                    </label>
                    <label for="profile13">
                        <input type="radio" name="profile" id="profile13" value="13">
                        <img class="profile-img" src="../img/pfp/pfp13.png">
                    </label>
                    <label for="profile14">
                        <input type="radio" name="profile" id="profile14" value="14">
                        <img class="profile-img" src="../img/pfp/pfp14.png">
                    </label>
                    <label for="profile15">
                        <input type="radio" name="profile" id="profile15" value="15">
                        <img class="profile-img" src="../img/pfp/pfp15.png">
                    </label>
                    <label for="profile16">
                        <input type="radio" name="profile" id="profile16" value="16">
                        <img class="profile-img" src="../img/pfp/pfp16.png">
                    </label>
                </fieldset>
                <div class="form-content">
                    <img src="../img/pfp/pfp<?=$user['profile_image'] ?>.png" id="preview-profile" width="100px" alt="<?=$user['profile_image'] ?>">
                </div>
                <div class="form-content">
                    <label for="username">Username</label>
                    <input value="<?=$user['username'] ?>" type="text" name="username" maxlength="20" id="username" autocomplete="off" required="" autofocus placeholder="Type here...">
                </div>
                <div class="form-content password">
                    <label for="password">Password</label>
                    <input value="<?=$user['password'] ?>" type="password" name="password" id="password" autocomplete="off" required="" autofocus placeholder="Type here...">
                    <img style="color: red;" src="../img/eye-fill.svg" id="showpassword">
                </div>
                <div class="form-content">
                    <label for="nickname">Nickname</label>
                    <input value="<?=$user['nick_name'] ?>" type="text" name="nickname" maxlength="50" id="nickname" autocomplete="off" required="" autofocus placeholder="Type here...">
                </div>
            </form>
            <button type="button" id="editbtn">Simpan</button>
            <span id="hapusbtn" style="color:red;">Hapus akun</span>
        </div>
    </div>
    <div id="current_password" style="color: red; display:none;"><?=$user['password'] ?></div>
    <div id="user_id" style="color: red; display:none; "><?=$_SESSION['trainkey_id'] ?></div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/function.js"></script>
    <script src="edit.js"></script>
</body>
</html>