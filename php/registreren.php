<?php
session_start();
include "../private/connectioncineflex.php";

// echo "<pre>", print_r($_POST), "</pre>";

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$leeftijd = $_POST['leeftijd'];
$wachtwoord = $_POST['wachtwoord '];
$postcode = $_POST['postcode'];
$woonplaats = $_POST['woonplaats'];
$straat = $_POST['straat'];
$provincie = $_POST['provincie'];
$telefoon = $_POST['telefoon'];

$sql = "INSERT INTO klanten (voornaam, achternaam, email, wachtwoord, leeftijd, postcode, woonplaats, straat, provincie, telefoon)
        VALUES (:voornaam, :achternaam, :email, :wachtwoord, :leeftijd, :postcode, :woonplaats, :straat, :provincie, :telefoon)";
$smt = $conn->prepare($sql);
$smt->execute(array(
    ':voornaam' => $voornaam,
    ':achternaam' => $achternaam,
    ':email' => $email,
    ':leeftijd' => $leeftijd,
    ':wachtwoord' => $wachtwoord,
    ':postcode' => $postcode,
    ':woonplaats' => $woonplaats,
    ':straat' => $straat,
    ':provincie' => $provincie,
    ':telefoon' => $telefoon
));
$_SESSION['newuser'] = 'CineFlex verwelkomt u bij uw nieuwe account!';

header('location: ../index.php?page=home');
?>