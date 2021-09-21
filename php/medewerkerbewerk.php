<?php 
require "../private/connectioncineflex.php";
session_start();

$voornaam   = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email      = $_POST['email'];
$id         = $_POST['id'];

$sql = "UPDATE medewerkers

SET voornaam    = :voornaam,
achternaam      = :achternaam,
email           = :email

WHERE medewerker_id = :id";

$stmt = $conn->prepare($sql);
$result = $stmt->execute(array(
    ':voornaam'     => $voornaam,
    ':achternaam'   => $achternaam,
    ':email'        => $email
));

if ($result){
    echo 'Successfully edited';
    header('location: ../index.php?page=medewerkers');
    }
else{
    echo 'Something went wrong with the connection';
    header('location: ../index.php?page=medewerkersbewerk');
    }

?>