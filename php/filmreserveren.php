<?php
require "../private/connectioncineflex.php";
session_start();

$planning = $_POST['planning'];
$klantid = $_SESSION['id'];
$stoelid = $_POST['stoelid'];

if (isset($_SESSION['id']) == null ) {
    $_SESSION['melding'] = 'Je moet ingelogt zijn om een film ticket te reserveren.';
    header('location: ../index.php?page=home');
}
else {
    for ($i = 0; $i < sizeof($stoelid); $i++) {

        $sql = "INSERT INTO reserveringen
                (klant_id, planning_id, stoel_id)
                VALUES (:klantid, :planning_id, :stoel)"; //we missen het stoelid maar die is WIP
        $smt = $conn->prepare($sql);
        $smt->execute(array(
            ':klantid' => $klantid,
            ':planning_id' => $planning,
            ':stoel' => $stoelid[$i]
        ));
    }

    $_SESSION['melding'] = 'Jij hebt successvol een ticket gereserveerd.';
    header('location: ../index.php?page=reserveringen');
}
?>