<?php

require "../private/connectioncineflex.php";

$titel = $_POST['titel'];
$poster = base64_encode(file_get_contents($_FILES['poster']['tmp_name']));
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
$kijkwijzers = $_POST['kijkwijzers'];
$selected = count($kijkwijzers);
$leeftijd = $_POST['leeftijd'];
$genre = $_POST['genre'];
$acteurs = $_POST['acteurs'];
$regisseurs = $_POST['regisseurs'];
$selected2 = count($acteurs);
$selected3 = count($regisseurs);

$sql = "INSERT INTO films (titel , poster , omschrijving , duratie  , leeftijd) VALUE (:titel , :poster , :omschrijving , :duratie ,  :leeftijd)";
$smt = $conn->prepare($sql);
$smt->execute(array(
    ':titel' => $titel,
    ':poster' => $poster,
    ':omschrijving' => $omschrijving,
    ':duratie' => $duratie,
    ':leeftijd' => $leeftijd
));


$filmid = $conn->LastInsertId();
echo "<pre>", print_r($_POST), "</pre>";

for ($i = 0; $i <= $selected -1; $i++) {
    $sql2 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id )
             VALUE (:film_id , :kijkwijzer_id)";
    $smt2 = $conn->prepare($sql2);
    $smt2->execute(array(
    ':kijkwijzer_id' => $kijkwijzers[$i],
    ':film_id' => $filmid
));
}
$sql3 = "INSERT INTO films_genres (genre_id, film_id )
             VALUE (:genreid , :film_id)";
$smt3 = $conn->prepare($sql3);
$smt3->execute(array(
    ':genreid' => $genre,
    ':film_id' => $filmid
));

for ($i = 0; $i <= $selected2 -1; $i++) {
    $sql4 = "INSERT INTO films_acteurs (acteur_id, film_id )
             VALUE (:acteurid , :film_id)";
    $smt4 = $conn->prepare($sql4);
    $smt4->execute(array(
        ':acteurid' => $acteurs[$i],
        ':film_id' => $filmid
    ));
}

for ($i = 0; $i <= $selected3 -1; $i++) {
    $sql5 = "INSERT INTO films_regisseurs (regisseurs_id, film_id )
             VALUE (:regisseurid , :film_id)";
    $smt5 = $conn->prepare($sql5);
    $smt5->execute(array(
        ':regisseurid' => $regisseurs[$i],
        ':film_id' => $filmid
    ));
}
header('location: ../index.php?page=filmsoverzicht');
