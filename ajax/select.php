<?php

require_once "../core/database.php";
$db = new Database();

$query = "SELECT * FROM user2";
$db->query($query);
echo json_encode($db->getAssoc());


?>