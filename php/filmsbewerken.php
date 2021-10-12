<?php
session_start();
require "../private/connectioncineflex.php"; 

$id = $_POST['film_id'];
$titel = $_POST['titel'];
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
$kijkwijzer = $_POST['kijkwijzers'];
$leeftijd = $_POST['leeftijd'];
$genre = $_POST['genre'];
$acteurs = $_POST['acteurs'];
$regisseurs = $_POST['regisseurs'];


$sql0 = "SELECT *
FROM films
WHERE titel = :titel";
$smt0 = $conn->prepare($sql0);
$smt0->execute(array(
    ':titel'   => $titel
));

$rowCount = $smt0->rowCount();

if($rowCount > 0)
{
    $_SESSION['error'] = "Titel bestaat al";
    header('location: ../index.php?page=filmsoverzicht');
}

// $active = $_POST['active'];
else if ($_FILES['poster']['tmp_name'] != null) {
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
} else if ($genre != null) {
    $sql5 = "DELETE FROM films_genres
         WHERE film_id = :id";
    $smt5 = $conn->prepare($sql5);
    $smt5->execute(array(
        ':id' => $id
    ));

    $sql6 = "INSERT INTO films_genres (genre_id, film_id )
             VALUE (:genreid , :film_id)";
    $smt6 = $conn->prepare($sql6);
    $smt6->execute(array(
        ':genreid' => $genre,
        ':film_id' => $id
    ));
    header('location: ../index.php?page=filmsoverzicht');
} else {
    header('location: ../index.php?page=filmsoverzicht');
}

//else if ($acteurs != null) {
//    $sql7 = "DELETE FROM films_kijkwijzers
//         WHERE film_id = :id";
//    $smt7 = $conn->prepare($sql7);
//    $smt7->execute(array(
//        ':id' => $id
//    ));
//
//    for($i = 0; $i < sizeof($acteurs); $i++) {
//        $sql8 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id )
//                VALUE (:film_id, :kijkwijzer_id)";
//        $smt8 = $conn->prepare($sql8);
//        $smt8->execute(array(
//            ':film_id'       => $id,
//            ':kijkwijzer_id' => $kijkwijzer[$i]
//        ));
//    }

