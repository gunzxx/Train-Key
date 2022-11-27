<?php
include_once "../database.php";

$con = new Database();
$query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT {$_POST['limit']}";
$con->query($query);

$result = $con->getAssoc();
?>
<?php foreach($result as $k => $res){ ?>
    <div class="komen-container">
        <div class="profile">
            <p>x</p>
            <p id="rowcount"><?=$con->rowCount() ?></p>
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

