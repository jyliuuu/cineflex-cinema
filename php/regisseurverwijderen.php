<?php
include "../private/connectioncineflex.php";

$id     = $_POST['id'];

$sql = "DELETE FROM regisseurs
WHERE regisseur_id = :id";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $id
));

header('location: ../index.php?page=acteurs');
?>