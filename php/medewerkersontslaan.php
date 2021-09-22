<?php 
include "../private/connectioncineflex.php";

$id     = $_POST['id'];

$sql = "DELETE FROM medewerkers
WHERE medewerker_id = :id";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $id
));
?>