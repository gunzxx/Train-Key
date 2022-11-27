<?php

include_once "database.php";

$con = new Database();
$query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT 20";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="forum-container">
            <div class="chat-area">
                <?php foreach($result as $k => $res){ ?>
                    <div class="komen-container">
                        <div class="profile">
                            <p>x</p>
                        </div>
                        <div id="chat-container" class="chat-container">
                            <div class="header-komen">
                                <p class="username"><?=$res['userid'] ?></p>
                                <p class="tanggal"><?=$res['tanggal'] ?></p>
                            </div>
                            <p class="text-chat"><?=$res['textchat'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="last-comment" id="last-comment">
                <p>INI KOMENTAR TERAKHIR</p>
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
    <script src="js/script.js"></script>
</div>
</body>
</html>