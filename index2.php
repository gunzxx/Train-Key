<?php 
if(isset($_POST['poin'])){
    echo "Berhasil";
}
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
    <link rel="stylesheet" href="http://localhost/08%20Projek/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="nav">
        <a href="" class="brand">
            <h1>Train Key</h1>
        </a>
        <div class="sub-nav">
            <a class="nav-list">
                <p>Ranking</p>
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

    <!-- Sample Teks -->
    <div class="teksSample text-center">
        <div class="teksLabel">
            <p class="" id="teksCase">Kalimat sedang dimuat...</p>
        </div>
    </div>
    <!-- End Sample Teks -->
    
    
    <div class="userArea" id="userArea">
        
        <!-- User Input -->
        <div class="inputArea">
            <!-- <label for="masukan">Masukkan teks</label> -->
            <input id="userInput" placeholder="Ketuk untuk memulai...">
            <button id="reset">Reset</button>
        </div>
        <!-- End User Input -->
        
    </div>
    
    
    <!-- Timer -->
    <div class="timer text-center" id="teksCount">
        <p class="timerTeks" id="countdown">60</p>
    </div>
    <!-- End Timer -->
    

    <!-- Poin -->
    <div class="container flex">
        <div class="score" id="score">
            <h2 class="text-center">Score</h2>
            <div class="col flex justify-content-space-around">
                <div class="col1">
                    <p>Poin Sekarang : </p>
                    <p>Poin tertinggi : </p>
                </div>
                <div class="col2">
                    <p id="poinNow" name="poinNow" value="">Poin</p>
                    <p id="highPoin" name="highPoin" value="10">Poin</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Poin -->
    
    
    
    <script src="js/data.js"></script>
    <script src="js/script.js"></script>
    <script src="js/fetch.js"></script>
</body>
</html>
