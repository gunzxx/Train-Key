<?php
require_once "../core/function.php";
cekSesi("../login.php");

require_once "../core/database.php";

$con = new Database();
$query = "SELECT c.text_chat as text_chat, c.tanggal as tanggal, u.user_id, u.nick_name, u.username, u.profile_image FROM chat as c join user as u using(user_id) ORDER BY tanggal DESC LIMIT 20";
$con->query($query);

$result = $con->getAssoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - TrainKey</title>
    <link rel="icon" type="image/x-icon" href="https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/img/logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins');
    </style>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="train-style.css">
</head>
<body>
    <div class="train-container" id="train-container">
        <div class="container">
            <div class="content">
                <div class="track"></div>
                <div class="train">
                <div class="front"></div>
                <div class="wheels">
                    <div class="smallOne"></div>
                    <div class="smallTwo"></div>
                    <div class="smallThree"></div>
                    <div class="smallFour"></div>
                    <div class="smallFive"></div>
                    <div class="smallSix"></div>
                    <div class="big"></div>
                </div>
                <div class="cord"></div>
                <div class="coach"></div>
                <div class="coachTwo"></div>
                <div class="windows"></div>
                
                <div id="up" class="steam"></div>
                <div id="up" class="steam2"></div>
                <div id="up" class="steam3"></div>
                </div>
            </div>
        </div>
    </div>
    
    <p class="notify" id="notify">Notify</p>
    <div class="nav">
        <a href="../">
            <img src="../img/logo.png" alt="" width="70px">
        </a>
        <h1 style="text-align: center;">Community</h1>

    </div>
    <div class="container">
        <div class="forum-container">
            <h1 class="judul">Selamat datang di Forum Trainkey</h1>
            <p class="subjudul">Harap saling menghormati dan menghargai</p>
            <div class="chat-area">
            <?php foreach($result as $res){ ?>
                <?php if($res['user_id'] == $_SESSION['trainkey_id']) {?>
                    <div class="komen-container my-comment">
                        <div id="chat-container" class="chat-container my-comment">
                            <div class="header-komen">
                                <p class="username"><?=$res['nick_name'] ?>
                                <p class="tanggal"><?=$res['tanggal'] ?></p>
                            </div>
                            <p class="text-chat"><?=$res['text_chat'] ?></p>
                        </div>
                        <div class="profile-container">
                            <img src="../img/pfp/pfp<?=$res['profile_image'] ?>.png" class="profile_img" id="profile" alt="">
                            <p class="rowcount" id="rowcount" style="display: none;"><?=$rowcount ?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php if($res['user_id'] != $_SESSION['trainkey_id']) {?>
                    <div class="komen-container">
                        <div class="profile-container">
                            <img src="../img/pfp/pfp<?=$res['profile_image'] ?>.png" class="profile_img" id="profile" alt="">
                            <p class="rowcount" id="rowcount" style="display: none;"><?=$rowcount ?></p>
                        </div>
                        <div id="chat-container" class="chat-container">
                            <div class="header-komen">
                                <p class="username"><?=$res['nick_name'] ?>
                                <p class="tanggal"><?=$res['tanggal'] ?></p>
                            </div>
                            <p class="text-chat"><?=$res['text_chat'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
            <div class="last-comment" id="last-comment">
                <p style="color: #eee; font-size:20px;">INI KOMENTAR TERAKHIR</p>
            </div>

            <div id="komen">
                <input type="text" name="tekskomen" id="tekskomen" maxlength="50" placeholder="Dimohon untuk tidak membawa unsur SARA">
                <button type="button" name="komen" id="kirimkomen">Kirim</button>
            </div>
        </div>
    </div>


    <div class="loading-container" id="loading-container">
        <div class="loading-outer" id="loading">
            <div class="loading-inner"></div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/function.js"></script>
    <script src="js/script.js"></script>
</div>
</body>
</html>