<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
} else {
    //
}
?>
<?php
require_once('db.php');

$arID = $_POST['ID'];
$title = $_POST['title'];
$body = $_POST['body'];
$pbsts = $_POST['publishSts'];
$upDT = date('Y-m-d H:i:s');

$sesU = $_SESSION['username'];
$chksql = "SELECT authors.id FROM authors WHERE username = '$sesU'";
$chksql2 = "SELECT articles.authors_id FROM articles WHERE id = $arID";
$resultS1 = $mysqli->query($chksql);
$resultS2 = $mysqli->query($chksql2);
$row1 = $resultS1->fetch_object();
$row2 = $resultS2->fetch_object();

if ($row1->id == $row2->authors_id) {
    $sql = "UPDATE articles
        SET title = '" . $_POST["title"] . "', body = '" . $_POST["body"] . "', updatetime = '$upDT' , publish_sts = '" . $_POST["publishSts"] . "'
        WHERE id = '" . $_POST["ID"] . "' ";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $title, $body, $upDT, $pbsts);
    $stmt->execute();

    header("location: myarticle.php");
} else {
    echo "<script type='text/javascript'>alert('*ไม่สามารถแก้ไขบทความผู้อื่นได้!');history.go(-1);</script>";
}
?>
