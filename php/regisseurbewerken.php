<?php
require "../private/connectioncineflex.php";
session_start();

$naam   = $_POST['naam'];
$id     = $_POST['id'];



$sql = "SELECT *
FROM regisseurs
WHERE naam = :naam";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':naam'    => $naam
));

$rowCount = $stmt->rowCount();

if($rowCount > 0)
{
    $_SESSION['error'] = "naam bestaat al";
    header('location: ../index.php?page=regisseursbewerken&regisseur_id='.$id.''); //gebruik database info inplaats van post
}

else if($naam == NULL) {
    $_SESSION["error"] = "Geen bewerking gedaan.";
    header('location: ../index.php?page=regisseurs');
}

else
{
    $sql6 = "UPDATE regisseurs

SET naam    = :naam

WHERE regisseur_id = :id";

    $stmt6 = $conn->prepare($sql6);
    $result = $stmt6->execute(array(
        ':naam'         => $naam,
        ':id'           => $id,
    ));

// echo "<pre>", print_r($), "</pre>";

    if ($result){
        echo 'Successfully edited';
        header('location: ../index.php?page=regisseurs');
    }
    else{
        echo 'Something went wrong with the connection';
        header('location: ../index.php?page=regisseursbewerken');
    }
}

?>