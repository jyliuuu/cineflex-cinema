<?php
session_start();
require "../private/connectioncineflex.php"; 

$id = $_POST['film_id'];
$titel = $_POST['titel'];
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
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
        SET titel = :titel, omschrijving = :omschrijving, duratie = :duratie
        WHERE film_id = :id";
    $smt2 = $conn->prepare($sql2);
    $smt2->execute(array(
        ':titel' => $titel,
        ':omschrijving' => $omschrijving,
        ':duratie' => $duratie,
        ':id' => $id
    ));
}
echo "<pre>", print_r($id), "</pre>";
header('location: ../index.php?page=filmsoverzicht');
