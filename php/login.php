<?php
session_start();
require "../private/connectioncineflex.php";

<<<<<<< HEAD
$sql = 'SELECT klant_id, voornaam, email, wachtwoord FROM klanten WHERE email = :email';

=======
$sql = 'SELECT medewerker_id, email, wachtwoord, voornaam, rol
        FROM medewerkers
        WHERE email = :email';
>>>>>>> 098eaba4754dd47f620a28bc54bb67b09c0670ba
$sth = $conn->prepare($sql);
$sth->execute(array(    
    ':email'=> $_POST['email']
));
<<<<<<< HEAD
$rs = $sth->fetch(PDO::FETCH_ASSOC);

if (password_verify ($_POST['wachtwoord'], $rs['wachtwoord'])) {
    $_SESSION['klantid'] = $rs['klant_id'];
    $_SESSION['voornaam'] = $rs['voornaam'];
    // header('location: ../index.php?page=welkom');
    echo "<pre>", print_r($_POST), "</pre>";
} else {
    $_SESSION['melding'] = 'U heeft incorrecte kredieten ingevuld.';  
    // header('location: ../index.php?page=login');
    echo "<pre>", print_r($_POST), "</pre>";
=======

$sql2 = 'SELECT klant_id, email, wachtwoord, voornaam, leeftijd, rol
        FROM klanten
        WHERE email = :email';
$sth2 = $conn->prepare($sql2);
$sth2->execute(array(    
    ':email'=> $_POST['email']
));

$row = $sth->fetch(PDO::FETCH_ASSOC); //STAFF LOGIN . 2 = STAFF . 3 = MANAGER
$row2 = $sth2->fetch(PDO::FETCH_ASSOC); //KLANT LOGIN 

echo "<pre>", print_r($row['rol']), "</pre>";

if ($_POST['wachtwoord'] == $row['wachtwoord'] OR $_POST['wachtwoord'] == $row2['wachtwoord']) {
    if (!empty($row)) {
        if ($row['rol'] > 1) {
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id'] = $row['medewerker_id'];
            $_SESSION['voornaam'] = $row['voornaam'];
            echo "staff";
            header('location: ../index.php?page=welkom');
        } else if ($row['rol'] < 2) {
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id'] = $row['medewerker_id'];
            $_SESSION['voornaam'] = $row['voornaam'];
            echo "manager";
            header('location: ../index.php?page=welkom');
        }
    } else {
        $_SESSION['id'] = $row2['klant_id'];
        $_SESSION['rol'] = $row2['rol'];
        $_SESSION['voornaam'] = $row2['voornaam'];
        echo "klant";
        header('location: ../index.php?page=welkom');
    }
} else {
    $_SESSION['melding'] = 'U heeft incorrecte kredieten ingevuld.';  
    echo "<pre>", print_r($_POST), "</pre>";
    header('location: ../index.php?page=login');
>>>>>>> 098eaba4754dd47f620a28bc54bb67b09c0670ba
}
