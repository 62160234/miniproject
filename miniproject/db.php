<?php
// connect database 
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "bewtyblog";

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->set_charset("utf8");
?>