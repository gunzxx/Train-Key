<?php

require_once "../core/database.php";
session_start();

$con = new Database();

$query = "SELECT u.nick_name as 'nick_name', p.high_poin as 'high_poin', p.tanggal as 'tanggal'
            FROM poin as p 
            JOIN user u USING(user_id) 
            ORDER BY high_poin DESC, tanggal ASC
            LIMIT 10";
$con->query($query);
$users = $con->getAssoc();

if(isset($_POST['limit'])){
    $query = "SELECT u.nick_name as 'nick_name', p.high_poin as 'high_poin', p.tanggal as 'tanggal', u.profile_image , u.user_id as user_id
    FROM poin as p 
    JOIN user u USING(user_id) 
    ORDER BY high_poin DESC, tanggal ASC
    LIMIT 10";
    $con->query($query);
    $users = $con->getAssoc();
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