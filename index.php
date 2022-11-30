<?php 
include "core/config.php";
include "core/database.php";

$con = new Database();
$query = "SELECT * FROM poin WHERE user_id = 1";
$con->query($query);
$res = $con->getSingle();

// session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Key</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins');
    </style>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!-- Navbar -->
    <div class="nav">
        <a href="" class="brand">
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
        <div class="profile">

        </div>
    </div>
    <!-- End Navbar -->

    <!-- Game contain -->
    <div id="gamecontainer">
        
        <!-- Sample Teks -->
        <div class="container flex">
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
                <p class="kata kata9"></p><span>&nbsp;</span>
            </div>
        </div>
        <!-- End Sample Teks -->
        
        
        <div class="userArea" id="userArea">
            
            <!-- User Input -->
            <div class="inputArea">
                <!-- <label for="masukan">Masukkan teks</label> -->
                <input id="userInput" autocomplete="off" placeholder="Tunggu ya :>" disabled="">
                <button id="restart">Restart</button>
            </div>
            <!-- End User Input -->
            
        </div>
        
        
        <!-- Timer -->
        <div class="timer text-center" id="countdown">
            <p class="timerTeks" id="tekscount">60</p>
        </div>
        <!-- End Timer -->
        

        <!-- Poin -->
        <div class="flex">
            <table>
                <tbody>
                    <tr>
                        <td class="col1"><p>Banyak huruf diketik : </p></td>
                        <td class="col2"><p id="huruf" name="poinNow" value="">Poin</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Benar : </p></td>
                        <td class="col2"><p id="benar" name="highPoin" value="10">Poin</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Salah : </p></td>
                        <td class="col2"><p id="salah" name="highPoin" value="10">Poin</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Poin : </p></td>
                        <td class="col2"><p id="poin" name="highPoin" value="10">Poin</p></td>
                    </tr>
                    <tr>
                        <td class="col1"><p>Poin tertinggi : </p></td>
                        <td class="col2"><p id="high_poin" name="high_poin" value="10"><?=$res['high_poin'] ?></p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Poin -->

    </div>
    <!-- End Game contain -->
    
    <span id="user_id" style="display: none;">1</span>
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/function.js"></script>
    <script src="js/data.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
