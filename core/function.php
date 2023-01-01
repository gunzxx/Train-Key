<?php
function cekSesi(string $location){
    session_start();
    if(!isset($_SESSION['trainkey_id'])){
        header("Location: $location");
    }
    // echo "cek sesi";
}

function sesiLogin(){
    session_start();
    if(isset($_SESSION['trainkey_id'])){
        header("https://pbw.ilkom.unej.ac.id/tia/tia212410102033/pweb/");
        exit;
    }
}
?>