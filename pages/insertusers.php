<?php
include 'cnx.php';

$name = $_POST['Nom'];
$passwords = $_POST['passwords'];
$email = $_POST['email'];
    

$sql = "INSERT into user(Nom, passwords, email) values 
('$name', '$passwords', '$email')";

$res = mysqli_query($cnx, $sql);

if ($res)
    header("location:./dashboardusers.php");





mysqli_close($cnx);
?>
