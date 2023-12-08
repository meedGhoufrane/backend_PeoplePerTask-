<?php
require '../cnx.php';

$Montant = $_POST['Montant'];
$Delai = $_POST['Delai'];

$sql = "INSERT INTO Offres (Montant, Délai) VALUES (?, ?)";
$stmt = mysqli_prepare($cnx, $sql);

mysqli_stmt_bind_param($stmt, "is", $Montant, $Delai);


$res = mysqli_stmt_execute($stmt);

if ($res) {
    header("location: forminser.php");
} else {
    echo "Error: " . mysqli_error($cnx);
}

mysqli_stmt_close($stmt);
mysqli_close($cnx);
?>
