<?php

require "../private/connectioncineflex.php";

$titel = $_POST['titel'];
$poster = base64_encode(file_get_contents($_FILES['poster']['tmp_name']));
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
$kijkwijzers = $_POST['kijkwijzers'];
$leeftijd = $_POST['leeftijd'];

$aantal = count($kijkwijzers);

$sql = "INSERT INTO films (titel, poster, omschrijving, duratie)
VALUE (:titel, :poster, :omschrijving, :duratie)";
$smt = $conn->prepare($sql);
$smt->execute(array(
    ':titel' => $titel,
    ':poster' => $poster,
    ':omschrijving' => $omschrijving,
    ':duratie' => $duratie
));

$nieuw = $conn->LastInsertId();

echo "<pre>", print_r($leeftijd), "</pre>";

echo "<pre>", print_r($aantal), "</pre>";

for ($i = 0; $i < $aantal - 1; $i++) {
    $sql2 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id) 
             VALUE (:film_id , :kijkwijzer_id)";
    $smt2 = $conn->prepare($sql2);
    $smt2->execute(array(
        ':film_id' => $nieuw,
        ':kijkwijzer_id' => $kijkwijzers[$i]
    ));
}

header('location: ../index.php?page=filmsoverzicht');
