<?php

session_start();

$_SESSION['username']='true';
header("Location: index.php");

?>