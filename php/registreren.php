<?php
session_start();
include "../private/connectioncineflex.php";

// echo "<pre>", print_r($_POST), "</pre>";

$voornaam = strip_tags($_POST['voornaam']);
$achternaam = strip_tags($_POST['achternaam']);
$email = strip_tags($_POST['email']);
$leeftijd = strip_tags($_POST['leeftijd']);
$wachtwoord = strip_tags($_POST['wachtwoord']);
$postcode = strip_tags($_POST['postcode']);
$woonplaats = strip_tags($_POST['woonplaats']);
$straat = strip_tags($_POST['straat']);
$provincie = strip_tags($_POST['provincie']);
$telefoon = strip_tags($_POST['telefoon']);

$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

$sql = "SELECT *
FROM klanten
WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':email'    => $email
));

$sql2 = "SELECT *
FROM medewerkers
WHERE email = :email";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute(array(
    ':email'    => $email
));

$rowCount = $stmt->rowCount();
$rowCount2 = $stmt2->rowCount();


if(strlen($wachtwoord) < 6)
{
    $_SESSION['error'] = "Wachtwoord is te kort. Het moet meer dan 6 karakters bevatten";
    header('location: ../index.php?page=registreren');
}



else if($rowCount > 0)
{
    $_SESSION['error'] = "email bestaat al";
    header('location: ../index.php?page=registreren');
}

else if($rowCount2 > 0)
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