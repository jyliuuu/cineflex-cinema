<?php
session_start();
require "../private/connectioncineflex.php"; 

$id = $_POST['film_id'];
$titel = $_POST['titel'];
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
$kijkwijzer = $_POST['kijkwijzers'];
$leeftijd = $_POST['leeftijd'];
// $active = $_POST['active'];
if ($_FILES['poster']['tmp_name'] != null) {
    $img = base64_encode(file_get_contents($_FILES['poster']['tmp_name']));
    $sql = "UPDATE films
        SET titel = :titel, omschrijving = :omschrijving, poster = :poster, duratie = :duratie
        WHERE film_id = :id";
    $smt = $conn->prepare($sql);
    $smt->execute(array(
        ':titel' => $titel,
        ':omschrijving' => $omschrijving,
        ':poster' => $img,
        ':duratie' => $duratie,
        ':id' => $id
    ));
} else {
    $sql2 = "UPDATE films
        SET titel = :titel, omschrijving = :omschrijving, duratie = :duratie, leeftijd = :leeftijd
        WHERE film_id = :id";
    $smt2 = $conn->prepare($sql2);
    $smt2->execute(array(
        ':titel' => $titel,
        ':omschrijving' => $omschrijving,
        ':duratie' => $duratie,
        ':leeftijd' => $leeftijd,
        ':id' => $id
    ));
}

if ($kijkwijzer != null) {
    $sql3 = "DELETE FROM films_kijkwijzers
         WHERE film_id = :id";
    $smt3 = $conn->prepare($sql3);
    $smt3->execute(array(
        ':id' => $id
    ));

    for($i = 0; $i < sizeof($kijkwijzer); $i++) {
        $sql4 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id )  
                VALUE (:film_id, :kijkwijzer_id)";
        $smt4 = $conn->prepare($sql4);
        $smt4->execute(array(
            ':film_id'       => $id,
            ':kijkwijzer_id' => $kijkwijzer[$i]
        ));
    }

    $sql5 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id )  
                VALUE (:film_id, :kijkwijzer_id)";
        $smt5 = $conn->prepare($sql5);
        $smt5->execute(array(
            ':film_id'       => $id,
            ':kijkwijzer_id' => $leeftijd
        ));
    header('location: ../index.php?page=filmsoverzicht');
} else {
    header('location: ../index.php?page=filmsoverzicht');
}

