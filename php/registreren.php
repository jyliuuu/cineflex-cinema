<?php
session_start();
include "../private/connectioncineflex.php";

// echo "<pre>", print_r($_POST), "</pre>";

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$leeftijd = $_POST['leeftijd'];
$wachtwoord = $_POST['wachtwoord'];
$postcode = $_POST['postcode'];
$woonplaats = $_POST['woonplaats'];
$straat = $_POST['straat'];
$provincie = $_POST['provincie'];
$telefoon = $_POST['telefoon'];

$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

$sql = "SELECT *
FROM klanten
WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':email'    => $email
));
$rowcount = $stmt->rowCount();

if(strlen($wachtwoord) < 6)
{
    $_SESSION['error'] = "Wachtwoord is te kort. Het moet meer dan 6 karakters bevatten";
    header('location: ../index.php?page=registreren');
}



else if($rowcount > 0)
{
    $_SESSION['error'] = "email bestaat al";
    header('location: ../index.php?page=registreren');
}

else
{
$sql2 = "INSERT INTO klanten (voornaam, achternaam, email, wachtwoord, leeftijd, postcode, woonplaats, straat, provincie, telefoon, rol)
        VALUES (:voornaam, :achternaam, :email, :wachtwoord, :leeftijd, :postcode, :woonplaats, :straat, :provincie, :telefoon, :rol)";
$smt2 = $conn->prepare($sql2);
$smt2->execute(array(
    ':voornaam' => $voornaam,
    ':achternaam' => $achternaam,
    ':email' => $email,
    ':leeftijd' => $leeftijd,
    ':wachtwoord' => $hash,
    ':postcode' => $postcode,
    ':woonplaats' => $woonplaats,
    ':straat' => $straat,
    ':provincie' => $provincie,
    ':telefoon' => $telefoon,
    ':rol' => 3 
));
$_SESSION['newuser'] = 'CineFlex verwelkomt u bij uw nieuwe account!';
header('location: ../index.php?page=home');
}
?>