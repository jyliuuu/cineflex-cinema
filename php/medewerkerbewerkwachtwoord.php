<?php 
require "../private/connectioncineflex.php";
session_start();

$id         = $_POST['id'];
$wachtwoord = strip_tags($_POST['wachtwoord']);

$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

$sql = "SELECT *
FROM medewerkers
WHERE medewerker_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(   
    ':id'    => $id
));

if(strLen($wachtwoord) < 6)
{
    $_SESSION['error'] = "Wachtwoord is te kort. Het moet meer dan 6 karakters bevatten";
    header('location: ../index.php?page=medewerkerwachtwoord');
}

else
{
    $sql2 = "UPDATE  medewerkers
             SET     wachtwoord   = :wachtwoord
             WHERE   medewerker_id  = :id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute(array(
        ':wachtwoord'   => $hash,
        ':id'           => $id
    ));
    $_SESSION['error'] = "Wachtwoord is bewerkt";
}
header('location: ../index.php?page=medewerkersbewerk&acc_id='.$id.'');


