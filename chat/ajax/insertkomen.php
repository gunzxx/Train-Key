<?php

include_once "../database.php";

$con = new Database();

if (isset($_POST['komen'])){
    $tekskomen = htmlspecialchars($_POST['tekskomen']);
    if($tekskomen != "" && strlen($tekskomen)>1){
        $query = "INSERT INTO chat VALUES ('',3,'$tekskomen',NOW())";
        $con->query($query);
        $con->execute();
    }
}

$query = "SELECT * FROM chat ORDER BY tanggal DESC LIMIT 20";
$con->query($query);
$result = $con->getAssoc();
?>

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

