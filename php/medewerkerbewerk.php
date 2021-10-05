<?php 
require "../private/connectioncineflex.php";
session_start();

$voornaam   = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email      = $_POST['email'];
$id         = $_POST['id'];
$wachtwoord = $_POST['wachtwoord'];

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


if($rowCount > 0)
{
    $_SESSION['error'] = "email bestaat al";
    header('location: ../index.php?page=medewerkersbewerk&acc_id='.$id.''); //gebruik database info inplaats van post
}

else if($rowCount2 > 0)
{
    $_SESSION['error'] = "email bestaat al";
    header('location: ../index.php?page=medewerkersbewerk&acc_id='.$id.'');
}

else if(strlen($wachtwoord) < 6)
{
    $_SESSION['error'] = "Wachtwoord is tekort, moet minimaal 6 karakters hebben";
    header('location: ../index.php?page=medewerkersbewerk&acc_id='.$id.'');
}

else
{
$sql3 = "UPDATE medewerkers

SET voornaam    = :voornaam,
achternaam      = :achternaam,
email           = :email,
wachtwoord      = :wachtwoord

WHERE medewerker_id = :id";

$stmt3 = $conn->prepare($sql3);
$result = $stmt3->execute(array(
    ':voornaam'     => $voornaam,
    ':achternaam'   => $achternaam,
    ':email'        => $email,
    ':id'           => $id,
    ':wachtwoord'   => $wachtwoord
));

// echo "<pre>", print_r($), "</pre>";

if ($result){
    echo 'Successfully edited';
    header('location: ../index.php?page=medewerkers');
    }
else{
    echo 'Something we  nt wrong with the connection';
    header('location: ../index.php?page=medewerkersbewerk');
    }
}

?>