<?php

require "../private/connectioncineflex.php";


$titel = $_POST['titel'];
$poster = base64_encode(file_get_contents($_FILES['poster']['tmp_name']));
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
//$kijkwijzers = $_POST['kijkwijzers'];
$leeftijd = $_POST['leeftijd'];

$sql = "INSERT INTO films (titel , poster , omschrijving , duratie  , leeftijd) VALUE (:titel , :poster , :omschrijving , :duratie ,  :leeftijd)";
$smt = $conn->prepare($sql);
$smt->execute(array(
    ':titel' => $titel,
    ':poster' => $poster,
    ':omschrijving' => $omschrijving,
    ':duratie' => $duratie,
    ':leeftijd' => $leeftijd


));
/*$sql2 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id )  VALUE (:film_id , :kijkwijzer_id)";
$smt2 = $conn->prepare($sql2);
$smt2->execute(array(

    ':kijkwijzers_id' => $kijkwijzers

));*/
header('location: ../index.php?page=home');
