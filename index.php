<?php 
include "core/database.php";
require_once "core/function.php";
cekSesi("login.php");


$con = new Database();
$query = "SELECT u.nick_name as 'nick_name', p.high_poin as 'high_poin', p.tanggal as 'tanggal', u.profile_image , u.user_id as user_id
            FROM poin as p 
            JOIN user u USING(user_id) 
            ORDER BY high_poin DESC, tanggal ASC
            LIMIT 10";
$con->query($query);
$users = $con->getAssoc();

// echo $_SESSION['trainkey_id  '];
$query = "SELECT * FROM user as u join poin as p using(user_id) WHERE u.user_id = '{$_SESSION['trainkey_id']}';";
$con->query($query);
$user = $con->getSingle();


// var_dump($_COOKIE);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Key</title>
    <link rel="icon" type="image/x-icon" href="https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/img/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="nav">
        <a href="" class="brand">
            <img src="img/logo.png" alt="" width="70px">
            <h1>Train Key</h1>
        </a>
        <div class="sub-nav">
            <a class="nav-list" href="forum" target="_blank">
                <p>Forum</p>
            </a>
            <a class="nav-list">
                <p>Help & Support</p>
            </a>
            <a class="nav-list">
                <p>Documentation</p>
            </a>
        </div>
        <div class="profile-container">
            <img src="img/pfp/pfp<?=$user['profile_image'] ?>.png" alt="" class="profile" id="profile">
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="profile-menu" id="profile-menu">
        <a class="menu" href="editprofil">Edit profile</a>
        <a class="menu" id="logoutbtn">Logout</a>
    </div>

    <!-- BOX -->
    <div class="box-container">
        <!-- Rank -->
        <div class="itembox1">
            <div class="rank-container">
                <h3 class="text-center">Rank</h3>
                <input type="text" id="search" class="search" placeholder="Cari user">
                <table class="rank" id="rank">
                    <thead>
                        <td>No.</td>
                        <td colspan="2" style="text-align: center;">Nama</td>
                        <td>Poin</td>
                        <!-- <td>Tanggal</td> -->
                    </thead>
                    <tbody id="rank_body" class="rank-body">
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
                    </tbody>
                </table>
                <p class="showall" id="showall">Show all</p>
            </div>
        </div>
        <!-- End Rank -->
        
        <!-- Game container -->
        <div id="gamecontainer" class="game-container itembox2">
            

            <!-- Sample Teks -->
            <div class="teksLabel" id="sampleTeksContainer">
                <p class="kata kata0"></p><span>&nbsp;</span>
                <p class="kata kata1"></p><span>&nbsp;</span>
                <p class="kata kata2"></p><span>&nbsp;</span>
                <p class="kata kata3">Masih loading harap sabar....</p><span>&nbsp;</span>
                <p class="kata kata4"></p><span>&nbsp;</span>
                <p class="kata kata5"></p><span>&nbsp;</span>
                <p class="kata kata6"></p><span>&nbsp;</span>
                <p class="kata kata7"></p><span>&nbsp;</span>
                <p class="kata kata8"></p><span>&nbsp;</span>
                <p class="kata kata9"></p>
            </div>
            <!-- End Sample Teks -->
            
            
            <!-- User Input -->
            <input id="userInput" autocomplete="off" placeholder="Tunggu ya :>" disabled="">
            <!-- End User Input -->
            
            
            <!-- Timer -->
            <div class="timer" id="countdown-container">
                <p class="timerTeks text-center" id="countdown">60</p>
                <button id="restart">Restart</button>
            </div>
            <!-- End Timer -->
            
        </div>
        <!-- End Game contain -->
        
        
        <!-- Poin -->
        <div class="score-container itembox3">
            <table class="score">
                <tbody>
                    <tr>
                        <td class="col1"><p>Banyak huruf diketik : </p></td>
                        <td class="col2"><p id="huruf" name="poinNow" value="">0</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Benar : </p></td>
                        <td class="col2"><p id="benar" name="highPoin" value="10">0</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Salah : </p></td>
                        <td class="col2"><p id="salah" name="highPoin" value="10">0</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Poin : </p></td>
                        <td class="col2"><p id="poin" name="highPoin" value="10">0</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Poin tertinggi : </p></td>
                        <td class="col2"><p id="high_poin" name="high_poin" value="10"><?=$user['high_poin'] ?></p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Poin -->
    </div>
    <!-- End BOX -->
    
    <!-- <?=$user['user_id'] ?> -->
    <span id="user_id" style="display: none;"><?=$user['user_id'] ?></span>
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/function.js"></script>
    <script src="js/data.js"></script>
    <script src="js/main.js"></script>
</body>
</html>