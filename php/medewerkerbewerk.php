<?php 
require "../private/connectioncineflex.php";
session_start();

$voornaam   = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email      = $_POST['email'];
$id         = $_POST['id'];
$wachtwoord = $_POST['wachtwoord'];

$sql = "SELECT *
FROM medewerkers
WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':email'    => $email
));

$rowCount = $stmt->rowCount();

if($rowcount > 0)
{
    $_SESSION['error'] = "email bestaat al";
    header('location: ../index.php?page=registreren');
}

else if(strlen($wachtwoord) < 6)
{
    $_SESSION['error'] = "Wachtwoord is tekort, moet minimaal 6 karakters hebben";
    header('location: ../index.php?page=registreren');
}

$sql2 = "UPDATE medewerkers

SET voornaam    = :voornaam,
achternaam      = :achternaam,
email           = :email,
wachtwoord      = :wachtwoord

WHERE medewerker_id = :id";

$stmt2 = $conn->prepare($sql2);
$result = $stmt2->execute(array(
    ':voornaam'     => $voornaam,
    ':achternaam'   => $achternaam,
    ':email'        => $email,
    ':id'           => $id,
    ':wachtwoord'   => $wachtwoord
));

if ($result){
    echo 'Successfully edited';
    header('location: ../index.php?page=medewerkers');
    }
else{
    echo 'Something we  nt wrong with the connection';
    header('location: ../index.php?page=medewerkersbewerk');
    }

?>