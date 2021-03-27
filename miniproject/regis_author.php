<?php
    require_once('db.php');

    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $penname = $_POST['penname'];

    $chkusern = "SELECT authors.username FROM `authors` WHERE username = '$username'";
    $resultU = $mysqli->query($chkusern);
    $rowcount=mysqli_num_rows($resultU);
    if($rowcount <= 0){
        $sql = "INSERT 
        INTO authors (username, passwd, name, penname, email) 
        VALUES (?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $username, md5($passwd), $name, $penname, $email);
    $stmt->execute();
    header("location: index.php");
    }else{
        echo "<script type='text/javascript'>alert('*Username $username นี้ได้ถูกใช้แล้ว');history.go(-1);</script>";
    }

?>
