<?php
require_once "../../core/database.php";
session_start();

$con = new Database();

$query = "SELECT c.text_chat as text_chat, c.tanggal as tanggal, u.user_id, u.nick_name, u.username, u.profile_image AS profile_image FROM chat as c join user as u using(user_id) ORDER BY tanggal DESC LIMIT 20";
$con->query($query);

$result = $con->getAssoc();
$rowcount = $con->rowCount();

// var_dump($result);
if(isset($_POST['limit'])){
    $query = "SELECT c.text_chat as text_chat, c.tanggal as tanggal, u.user_id, u.nick_name, u.username, u.profile_image as profile_image FROM chat as c join user as u using(user_id) ORDER BY tanggal DESC LIMIT {$_POST['limit']}";
    $con->query($query);
    
    $result = $con->getAssoc();
    $rowcount = $con->rowCount();
}


?>
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

