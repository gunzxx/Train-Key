<?php

require_once "../core/database.php";
session_start();

$con = new Database();
$query = "SELECT u.*, p.* from user as u JOIN poin as p using(user_id)";
$con->query($query);
$users = $con->getAssoc();

if(isset($_POST['limit'])){
    $query = "SELECT u.*, p.* from user as u JOIN poin as p using(user_id) ORDER BY high_poin DESC, tanggal ASC LIMIT {$_POST['limit']}";
    $con->query($query);
    $users = $con->getAssoc();
    $_POST = [];
}

if(isset($_POST['showall'])){
    $query = "SELECT u.*, p.* from user as u JOIN poin as p using(user_id) ORDER BY high_poin DESC, tanggal ASC";
    $con->query($query);
    $users = $con->getAssoc();
    $_POST = [];
}
?>


<?php foreach($users as $k => $v) {?>
    <?php if($v['user_id'] == $_SESSION['trainkey_id']){ ?>
        <tr style="background-color:green;">
            <td class="no"><?=$k+1 ?></td>
            <td><img width="20px" height="20px" src="img/pfp/pfp<?=$v['profile_image']?>.png" alt=""></td>
            <td class="img"><?=$v['nick_name'] ?></td>
            <td class="data"><?=$v['high_poin'] ?></td>
            <!-- <td class="data" style="font-size:12px;"><?=$v['tanggal'] ?></td> -->
        </tr>
    <?php } ?>
    <?php if($v['user_id'] != $_SESSION['trainkey_id']){ ?>
        <tr>
            <td class="no"><?=$k+1 ?></td>
            <td><img width="20px" height="20px" src="img/pfp/pfp<?=$v['profile_image']?>.png" alt=""></td>
            <td class="img"><?=$v['nick_name'] ?></td>
            <td class="data"><?=$v['high_poin'] ?></td>
            <!-- <td class="data" style="font-size:12px;"><?=$v['tanggal'] ?></td> -->
        </tr>
    <?php } ?>
<?php } ?>