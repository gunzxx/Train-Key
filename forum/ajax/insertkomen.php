<?php

session_start();
require_once "../../core/database.php";

$con = new Database();

$query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT 20";
$con->query($query);
$result = $con->getAssoc();

if (isset($_POST['komen'])){
    $tekskomen = htmlspecialchars($_POST['tekskomen']);
    
    $query = "INSERT INTO chat(user_id,text_chat,tanggal) VALUES ({$_SESSION['trainkey_id']},'$tekskomen',NOW())";
    $con->query($query);
    $con->execute();

    $query = "SELECT c.text_chat as text_chat, c.tanggal as tanggal, u.user_id, u.nick_name, u.username, u.profile_image as profile_image FROM chat as c join user as u using(user_id) ORDER BY tanggal DESC LIMIT {$_POST['limit']}";
    $con->query($query);
    $result = $con->getAssoc();
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