<?php

require "../private/connectioncineflex.php";

$film_id = $_POST['film_id'];
$titel = $_POST['titel'];
$poster = base64_encode(file_get_contents($_FILES['poster']['tmp_name']));
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
$kijkwijzers = $_POST['kijkwijzers'];
$leeftijden = $_POST['leeftijden'];

$sql = "INSERT INTO films (titel , poster , omschrijving , duratie  , leeftijden) VALUE (:titel , :poster , :omschrijving , :duratie ,  :leeftijden)";
$smt = $conn->prepare($sql);
$smt->execute(array(
    ':titel' => $titel,
    ':poster' => $poster,
    ':omschrijving' => $omschrijving,
    ':duratie' => $duratie,
    ':leeftijden' => $leeftijden
));
$sql2 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id) VALUE (:film_id , :kijkwijzer_id)";
$smt2 = $conn->prepare($sql2);
$smt2->execute(array(
   ':film_id' => $film_id,
    ':kijkwijzers_id' => $kijkwijzers

));
header('location: ../index.php?page=home');
