<?php

require "../private/connectioncineflex.php";

$filmid = $_POST['film'];
$zaal = $_POST['zaal'];
$starttijd = $_POST['start'];

echo "<pre>", print_r($_POST), "</pre>";

$sql = "INSERT INTO planning (film_id, begin_tijd, eind_tijd, zaal_id, datum) 
        VALUE (:film_id, :begin_tijd, :eind_tijd, :zaal_id, :datum)";
$smt = $conn->prepare($sql);
$smt->execute(array(
    ':film_id' => $filmid,
    ':begin_tijd' => $omschrijving,
    ':eind_tijd' => $duratie,    
    ':zaal_id' => $zaal,
    ':datum' => $datum
));

header('location: ../index.php?page=filmsoverzicht');
