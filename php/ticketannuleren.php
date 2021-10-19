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
$_SESSION['melding2'] = 'Je hebt een ticket geannuleerd. ';
header('location: ../index.php?page=reserveringen');