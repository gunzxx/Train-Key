<?php  
session_start();
$_SESSION = [];
session_unset();
session_destroy();

unset($_SESSION);

// setcookie('username','');
// setcookie('password','');
setcookie('username','',time()-3600,'/');
setcookie('password','',time()-3600,'/');

header('Location: login.php')
?>