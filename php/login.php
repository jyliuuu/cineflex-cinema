<?php
session_start();
require "../private/connectioncineflex.php";

$sql = 'SELECT klant_id, voornaam, email, wachtwoord FROM klanten WHERE email = :email';

$sth = $conn->prepare($sql);
$sth->execute(array(    
    ':email'=> $_POST['email']
));
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
}
