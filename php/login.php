<?php
session_start();
require "../private/connectioncineflex.php";

$sql = 'SELECT klant_id, email, wachtwoord, voornaam, leeftijd, rol
        FROM klanten kt
        WHERE email = :email';
$sth = $conn->prepare($sql);
$sth->execute(array(    
    ':email'=> $_POST['email']
));

$sql2 = 'SELECT medewerker_id, email, wachtwoord, voornaam, rol
        FROM medewerkers mw
        WHERE email = :email';
$sth2 = $conn->prepare($sql2);
$sth2->execute(array(    
    ':email'=> $_POST['email']
));

$row = $sth->fetch(PDO::FETCH_ASSOC); //KLANT LOGIN  
$row2 = $sth2->fetch(PDO::FETCH_ASSOC); //STAFF LOGIN . 2 = STAFF . 3 = MANAGER

// $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify($_POST['wachtwoord'], $row['wachtwoord'])) {
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id'] = $row['klant_id'];
            $_SESSION['voornaam'] = $row['voornaam'];
            echo "klant";
            header('location: ../index.php?page=groet');        
} 

else if (password_verify($_POST['wachtwoord'], $row2['wachtwoord'])) {
    $_SESSION['rol'] = $row2['rol'];
    $_SESSION['id'] = $row2['medewerker_id'];
    $_SESSION['voornaam'] = $row2['voornaam'];
    echo "staff";
    header('location: ../index.php?page=groet');        
} 

else {
    $_SESSION['melding'] = 'U heeft incorrecte kredieten ingevuld.';
    header('location: ../index.php?page=login');
}

// echo "<pre>", print_r($row2['rol']), "</pre>";
