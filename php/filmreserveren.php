<?php
require "../private/connectioncineflex.php"; 
session_start();

$planning = $_POST['planning'];
$klantid = $_SESSION['id'];

// $stoelid = $_POST['stoelid'];
echo "<pre>", print_r($planning), "</pre>";
echo "<pre>", print_r($klantid), "</pre>";

if (isset($_SESSION['id']) == null ) {
    $_SESSION['melding'] = 'Je moet ingelogt zijn om een film ticket te reserveren.';
    header('location: ../index.php?page=home');
}
else {
    $sql = "INSERT INTO reserveringen 
    (klant_id, planning_id)
    VALUES (:klantid, :planning_id)"; //we missen het stoelid maar die is WIP
    $smt = $conn->prepare($sql);
    $smt->execute(array(
        ':klantid' => $klantid,
        ':planning_id' => $planning
    ));

    $_SESSION['melding'] = 'Jij hebt successvol een ticket gereserveerd.';
    header('location: ../index.php?page=reserveringen');
}
?>