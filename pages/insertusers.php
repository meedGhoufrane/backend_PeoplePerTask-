<?php
require 'cnx.php';

$name = $_POST['Nom'];
$passwords = $_POST['passwords'];
$email = $_POST['email'];
$otherinfo = $_POST['otherinfo'];
    

$sql = "INSERT into user(Nom, passwords, email,otherinfo) values 
('$name', '$passwords', '$email','$otherinfo')";

$res = mysqli_query($cnx, $sql);

if ($res)
    header("location:dashboardusers.php");





mysqli_close($cnx);
?>
