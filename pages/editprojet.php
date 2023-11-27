<?php
require 'cnx.php';

$id = $_GET['id'];
$Titre = $_POST['Titre'];
$Descriptions = $_POST['Descriptions'];
$idcat = $_POST['idcat'];
$iduser = $_POST['iduser'];

$sql = "UPDATE Projets
        SET
        Titre = '$Titre',
        Descriptions = '$Descriptions',
        idcat = $idcat,
        iduser = $iduser
        WHERE
            id = $id";
    
    

    $res = mysqli_query($cnx, $sql);
    if($res)
        header("location:dashboardtrend.php");

        mysqli_close($cnx);

?>