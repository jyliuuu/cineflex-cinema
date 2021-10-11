<?php 
session_start();
require '../private/connectioncineflex.php';

$id = $_POST['planningid'];

$sql3 ="DELETE FROM reserveringen
        WHERE planning_id = :id";
$smt3 = $conn->prepare($sql3);
$smt3->execute(array(
    ':id' => $id
));
$_SESSION['melding2'] = 'Je hebt een ticket geannuleerd. ';
header('location: ../index.php?page=reserveringen');