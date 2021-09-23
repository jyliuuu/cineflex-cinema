<?php 
require "../private/connectioncineflex.php";
session_start();

$voornaam   = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email      = $_POST['email'];
$wachtwoord   = $_POST['wachtwoord'];

$sql = "INSERT INTO medewerkers (voornaam, achternaam, email, wachtwoord, rol)
VALUES (:voornaam, :achternaam, :email, :wachtwoord, :rol)";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':voornaam'     => $voornaam,
    ':achternaam'   => $achternaam,
    ':email'        => $email,
    ':wachtwoord'   => $wachtwoord,
    ':rol'          => 2
));

header('location: ../index.php?page=medewerkers');
?>