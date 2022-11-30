<?php

include_once "../database.php";

$con = new Database();

$query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT 20";
$con->query($query);
$result = $con->getAssoc();

if (isset($_POST['komen'])){
    $tekskomen = htmlspecialchars($_POST['tekskomen']);
    
    $query = "INSERT INTO chat(user_id,text_chat,tanggal) VALUES (1,'$tekskomen',NOW())";
    $con->query($query);
    $con->execute();

    $query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT {$_POST['limit']}";
    $con->query($query);
    $result = $con->getAssoc();
}

?>

<?php foreach($result as $k => $res){ ?>
    <div class="komen-container">
        <div class="profile">
            <p>x</p>
            <p id="rowcount"><?=$con->rowCount() ?></p>
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

