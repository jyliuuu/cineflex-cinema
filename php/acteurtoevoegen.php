<?php
require "../private/connectioncineflex.php";
session_start();

$naam   = $_POST['naam'];

$sql = "SELECT *
FROM acteurs
WHERE  naam = :checknaam";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':checknaam'    => $naam
));
$r = $stmt->rowCount();

if($r > 0)
{
    $_SESSION['error'] = "Naam bestaat al";
    header('location: ../index.php?page=acteurs');
}

else
{
    $sql2 = "INSERT INTO acteurs (naam)
VALUES (:naam)";

    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute(array(
        ':naam' => $naam
    ));
    header('location: ../index.php?page=acteurs');
}

?>



?>