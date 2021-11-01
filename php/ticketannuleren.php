<?php 
session_start();
require '../private/connectioncineflex.php';

$id = $_POST['planningid'];
$sid = $_POST['stoelid'];

$sql3 ="DELETE FROM reserveringen
        WHERE planning_id = :id AND stoel_id = :stoelid";
$smt3 = $conn->prepare($sql3);
$smt3->execute(array(
    ':id' => $id,
    ':stoelid' => $sid
));

$sql2 = "UPDATE zaal_stoel
                SET active = :active
                WHERE zaal_stoel_id = :stoelid";
$smt2 = $conn->prepare($sql2);
$smt2->execute(array(
    ':active' => '0',
    ':stoelid' => $sid
));
$_SESSION['melding2'] = 'Je hebt een ticket geannuleerd. ';
header('location: ../index.php?page=reserveringen');