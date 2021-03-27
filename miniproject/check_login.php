<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    header("location: login.php");
}

if($_POST['username'] == null || $_POST['password'] == null) {
    echo "<script type='text/javascript'>alert('*กรุณากรอกชื่อผู้ใช้และรหัสผ่านให้ครบ!');history.go(-1);</script>";
}
else {

$username = $_POST['username'];
$passwd = $_POST['password'];

$DBServer = 'localhost';
$DBUser   = 'root';
$DBPass   = '';
$DBName   = 'bewtyblog';
$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
mysqli_set_charset($conn, "utf8");

$sql = "SELECT *
FROM authors
WHERE username='$username' AND passwd=md5('$passwd')";

$result = $conn->query($sql);
$row = $result->fetch_object();

if ($result->num_rows > 0) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $row->username;
    $_SESSION['name'] = $row->name;
    $_SESSION['auid'] = $row->id;
    header("location: myarticle.php");
    exit(0);
} else {
    echo "<script type='text/javascript'>alert('*เข้าสู่ระบบไม่สำเร็จ!');history.go(-1);</script>";
}

}
?>