<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
} else {
    //
}

require_once('db.php');

$sql = "DELETE FROM articles WHERE id = '".$_GET["id"]."'";
$stmt = $mysqli->prepare($sql);
$stmt->execute();

header("location: myarticle.php");
?>