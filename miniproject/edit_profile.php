<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
} else {
    //
}
require_once('db.php');

$auid = $_SESSION['auid'];
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$penname = $_POST['penname'];

$sql = "UPDATE authors
        SET username = '".$_POST["username"]."', passwd = '".md5($_POST["passwd"])."', name = '".$_POST["name"]."' , penname = '".$_POST["penname"]."', email = '".$_POST["email"]."'
        WHERE id = '".$_SESSION['auid']."' ";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssss", $username, $passwd, $name, $penname, $email);
$stmt->execute();

header("location: myarticle.php");
?>
