<?php
include "access.php";
$uname = $_GET["uname"];
$email = $_GET["mail"];
$pass = $_GET["pass"];
$sql = "insert into User(name,bal,email,password) values('$uname',0,'$email','$pass')";
$conn->query($sql);
header("Location:index.php");
?>
