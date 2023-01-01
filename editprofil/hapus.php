<?php

require_once "../core/database.php";
require_once "../core/function.php";

cekSesi("../");
$con = new Database();

if(isset($_POST['delete'])){
    $userid = htmlspecialchars($_POST['userid']);
    $query = "DELETE from chat WHERE user_id = $userid;
    DELETE from poin WHERE user_id = $userid;
    DELETE from user WHERE user_id = $userid;";
    $con->query($query);
    $con->execute();
    // echo $con->rowCount();
    if($con->rowCount()==0){

        $_SESSION = [];
        session_unset();
        session_destroy();

        unset($_SESSION);

        // setcookie('username','');
        // setcookie('password','');
        setcookie('username','',time()-3600,'/');
        setcookie('password','',time()-3600,'/');
        echo json_encode("dihapus");
    }
    else{
        echo json_encode("gagal");
    }
}

?>