<?php

include_once "../database.php";


$con = new Database();
$query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT 20";
$con->query($query);

$result = $con->getAssoc();


if(isset($_POST['loadmore'])){
    $query = "SELECT * FROM chat WHERE tanggal < '{$_POST['last_tanggal']}' ORDER BY tanggal DESC LIMIT 20";
    $con->query($query);

    $result = $con->getAssoc();
}
?>


<?php foreach($result as $k => $res){ ?>
    <div class="komen-container">
        <div class="profile">
            <p>x</p>
        </div>
        <div id="chat-container" class="chat-container">
            <div class="header-komen">
                <p class="username"><?=$res['user_id'] ?><span>&nbsp;</span>Anonymous</p>
                <p class="tanggal"><?=$res['tanggal'] ?></p>
            </div>
            <p class="text-chat"><?=$res['text_chat'] ?></p>
        </div>
    </div>
<?php } ?>