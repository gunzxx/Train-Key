<?php
include_once "../database.php";

$con = new Database();
$query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT {$_POST['limit']}";
$con->query($query);

$result = $con->getAssoc();
$rowcount = $con->rowCount();
?>
<?php foreach($result as $k => $res){ ?>
    <div class="komen-container">
        <div class="profile">
            <p>x</p>
            <p class="rowcount" id="rowcount"><?=$rowcount ?></p>
        </div>
        <div id="chat-container" class="chat-container">
            <div class="header-komen">
                <p class="username"><?=$res['user_id'] ?></p>
                <p class="tanggal"><?=$res['tanggal'] ?></p>
            </div>
            <p class="text-chat"><?=$res['textchat'] ?></p>
        </div>
    </div>
<?php } ?>

