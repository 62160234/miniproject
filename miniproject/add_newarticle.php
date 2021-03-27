<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
} else {
    //
}

require_once('db.php');

$title = $_POST['title'];
$body = $_POST['body'];
$now = date('Y-m-d H:i:s');
$auid = $_SESSION['auid'];
$sql = "INSERT INTO articles (title, body, create_ts, authors_id)
        VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss", $title, $body, $now, $auid);
$stmt->execute();

header("location: myarticle.php");
?>
