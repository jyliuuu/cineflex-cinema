<?php
session_start();
require "../private/connectioncineflex.php";

$sql = 'SELECT medewerker_id, email, wachtwoord, voornaam, rol
        FROM medewerkers
        WHERE email = :email';
$sth = $conn->prepare($sql);
$sth->execute(array(    
    ':email'=> $_POST['email']
));

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

$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if ( password_verify(['wachtwoord'] == $row['wachtwoord'] OR $_POST['wachtwoord'] == $row2['wachtwoord'])) {
    if (!empty($row)) {
        if ($row['rol'] > 1) {
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id'] = $row['medewerker_id'];
            $_SESSION['voornaam'] = $row['voornaam'];
            echo "staff";
            header('location: ../index.php?page=groet');
        } else if ($row['rol'] < 2) {
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id'] = $row['medewerker_id'];
            $_SESSION['voornaam'] = $row['voornaam'];
            echo "manager";
            header('location: ../index.php?page=groet');
        }
    } else {
        $_SESSION['id'] = $row2['klant_id'];
        $_SESSION['rol'] = $row2['rol'];
        $_SESSION['voornaam'] = $row2['voornaam'];
        echo "klant";
        header('location: ../index.php?page=groet');
    }
} else {
    $_SESSION['melding'] = 'U heeft incorrecte kredieten ingevuld.';  
    echo "<pre>", print_r($_POST), "</pre>";
    header('location: ../index.php?page=login');
}
