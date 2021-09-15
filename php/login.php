<?php
session_start();
require "../private/connectioncineflex.php";

$sql = 'SELECT klant_id, voornaam, email, wachtwoord, rol
        FROM klanten
        WHERE email = :email';
$sth = $conn->prepare($sql);
$sth->execute(array(    
    ':email'=> $_POST['email']
));
$row = $sth->fetch(PDO::FETCH_ASSOC);

$sql2 = 'SELECT medewerker_id, voornaam, email, wachtwoord, rol
        FROM medewerkers
        WHERE email = :email'; 
$sth2 = $conn->prepare($sql2);
$sth2->execute(array(    
    ':email'=> $_POST['email']
));
$row2 = $sth2->fetch(PDO::FETCH_ASSOC);

    echo "<pre>", print_r($row2), "</pre>";

if (isset($_POST['wachtwoord'])) {
    if ($_POST['wachtwoord'] == $row['wachtwoord']) {
        $_SESSION['klantid'] = $row['klant_id'];
        $_SESSION['voornaam'] = $row['voornaam'];
        echo "<pre>", print_r($_SESSION), "</pre>";
        // header('location: ../index.php?page=welkom');
    } else {
        $_SESSION['melding'] = 'U heeft incorrecte kredieten ingevuld.';  
        echo "<pre>", print_r($_POST), "</pre>";
        echo "<pre>", print_r($row['wachtwoord']), "</pre>";
        // header('location: ../index.php?page=login');
    }
} else {
    $_SESSION['melding'] = 'Kan doorgestuurde wachtwoord niet vinden, probeer opnieuw.';
}