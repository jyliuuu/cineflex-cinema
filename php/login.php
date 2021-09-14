<?php
session_start();
require '../private/connectioncineflex.php';

$sql = 'SELECT klant_id, email, wachtwoord FROM klanten WHERE email = :email';

$sth = $conn->prepare($sql);
$sth->execute(array(    
    ':email'=> $_POST['email']
));
$rs = $sth->fetch(PDO::FETCH_ASSOC);

if (password_verify ($_POST['wachtwoord'], $rs['wachtwoord'])) {
    $_SESSION['rol'] = $rs['rol'];
    $_SESSION['userid'] = $rs['user_id'];
    $_SESSION['first_name'] = $rs['first_name'];
    header('location: ../index.php?page=welkom');
} else {
    $_SESSION['melding'] = 'U heeft incorrecte kredieten ingevuld.';  
    header('location: ../index.php?page=test');
}
