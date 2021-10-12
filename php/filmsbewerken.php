<?php
session_start();
require "../private/connectioncineflex.php"; 

$id = $_POST['film_id'];
$titel = strip_tags($_POST['titel']);
$omschrijving = $_POST['omschrijving'];
$duratie = $_POST['duratie'];
$kijkwijzer = $_POST['kijkwijzers'];
$leeftijd = $_POST['leeftijd'];
$genre = $_POST['genre'];
$acteurs = $_POST['acteurs'];
$regisseurs = $_POST['regisseurs'];

echo "<pre>", print_r($_POST), "</pre>";

// Database checkt voor dubbele data // titel van een film.
$sql0 = "SELECT *
        FROM films
        WHERE titel = :titel";
$smt0 = $conn->prepare($sql0);
$smt0->execute(array(
    ':titel'   => $titel
));

$rowCount = $smt0->rowCount(); //rowcount func die regels terug brengt

if($rowCount > 0) // als er wel een dubbele titel aanwezig is
{
    $_SESSION['error'] = "Titel bestaat al";
    header('location: ../index.php?page=filmsoverzicht');
} else {
    if ($_FILES['poster']['tmp_name'] != null && ($titel == null)) {
        $img = base64_encode(file_get_contents($_FILES['poster']['tmp_name']));
        $sql = "UPDATE films
            SET omschrijving = :omschrijving, poster = :poster, duratie = :duratie
            WHERE film_id = :id";
        $smt = $conn->prepare($sql);
        $smt->execute(array(
            ':omschrijving' => $omschrijving,
            ':poster' => $img,
            ':duratie' => $duratie,
            ':id' => $id
        ));
    }
    else if ($_FILES['poster']['tmp_name'] == null && ($titel != null)) {
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
    } else if ($_FILES['poster']['tmp_name'] != null && ($titel != null)) {
        $img = base64_encode(file_get_contents($_FILES['poster']['tmp_name']));
        $sql2 = "UPDATE films
            SET titel = :titel, omschrijving = :omschrijving, poster = :poster, duratie = :duratie, leeftijd = :leeftijd
            WHERE film_id = :id";
        $smt2 = $conn->prepare($sql2);
        $smt2->execute(array(
            ':titel' => $titel,
            ':omschrijving' => $omschrijving,
            ':poster' => $img,
            ':duratie' => $duratie,
            ':leeftijd' => $leeftijd,
            ':id' => $id
        ));
    } else if ($kijkwijzer != null) {
        $sql3 = "DELETE FROM films_kijkwijzers
                 WHERE film_id = :id";
        $smt3 = $conn->prepare($sql3);
        $smt3->execute(array(
            ':id' => $id
        ));
        for ($i = 0; $i < sizeof($kijkwijzer); $i++) {
            $sql4 = "INSERT INTO films_kijkwijzers (film_id, kijkwijzer_id )
                VALUE (:film_id, :kijkwijzer_id)";
            $smt4 = $conn->prepare($sql4);
            $smt4->execute(array(
                ':film_id' => $id,
                ':kijkwijzer_id' => $kijkwijzer[$i]
            ));
        }
        header('location: ../index.php?page=filmsoverzicht');
    }
    else if ($acteurs != null) {
        $sql7 = "DELETE FROM films_acteurs
                 WHERE film_id = :id";
        $smt7 = $conn->prepare($sql7);
        $smt7->execute(array(
            ':id' => $id
        ));
        for ($x = 0; $x < sizeof($acteurs); $x++) {
            $sql8 = "INSERT INTO films_acteurs (film_id, acteur_id )
                     VALUE (:film_id, :acteur)";
            $smt8 = $conn->prepare($sql8);
            $smt8->execute(array(
                ':film_id' => $id,
                ':acteur' => $acteurs[$x]
            ));
        }
        header('location: ../index.php?page=filmsoverzicht');
    }
    else if ($regisseurs != null) {
        $sql7 = "DELETE FROM films_regisseurs
                 WHERE film_id = :id";
        $smt7 = $conn->prepare($sql7);
        $smt7->execute(array(
            ':id' => $id
        ));

        for ($y = 0; $y < sizeof($regisseurs); $y++) {
            $sql8 = "INSERT INTO films_regisseurs (film_id, regisseurs_id )
                     VALUE (:film_id, :regisseursid)";
            $smt8 = $conn->prepare($sql8);
            $smt8->execute(array(
                ':film_id' => $id,
                ':regisseursid' => $regisseurs[$y]
            ));
        }
        header('location: ../index.php?page=filmsoverzicht');
    }
    $sql3 = "UPDATE films_genres
             SET genre_id = :genreid
             WHERE film_id = :id";
    $smt3 = $conn->prepare($sql3);
    $smt3->execute(array(
        ':genreid' => $genre,
        ':id' => $id
    ));
    header('location: ../index.php?page=filmsoverzicht');
}




