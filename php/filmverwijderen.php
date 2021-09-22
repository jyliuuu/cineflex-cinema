<?php 
session_start();
require '../private/connectioncineflex.php';

$id = $_POST['film_id'];

$sql3 ="DELETE FROM films
        WHERE film_id = :id";
$smt3 = $conn->prepare($sql3);
$smt3->execute(array(
    ':id' => $id
));

header('location: ../index.php?page=filmsoverzicht');
