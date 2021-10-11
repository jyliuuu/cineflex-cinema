<?php
include "../private/connectioncineflex.php";

$id     = $_POST['id'];

$sql = "DELETE FROM acteurs
WHERE acteur_id = :id";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $id
));

header('location: ../index.php?page=medewerkers');
?>