<?php
require "../private/connectioncineflex.php";
session_start();

$naam   = strip_tags($_POST['naam']);
$id     = $_POST['id'];

$sql = "SELECT *
FROM acteurs
WHERE naam = :naam";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':naam'    => $naam
));

$rowCount = $stmt->rowCount();

if($rowCount > 0)
{
    $_SESSION['error'] = "naam bestaat al";
    header('location: ../index.php?page=acteurbewerken&acteur_id='.$id.''); //gebruik database info inplaats van post
}

else if($naam == NULL) {
$_SESSION["error"] = "Geen bewerking gedaan.";
header('location: ../index.php?page=acteurs');
}

else
{
    $sql6 = "UPDATE acteurs

SET naam    = :naam

WHERE acteur_id = :id";

    $stmt6 = $conn->prepare($sql6);
    $result = $stmt6->execute(array(
        ':naam'         => $naam,
        ':id'           => $id,
    ));

// echo "<pre>", print_r($), "</pre>";

    if ($result){
        echo 'Successfully edited';
        header('location: ../index.php?page=acteurs');
    }
    else{
        echo 'Something went wrong with the connection';
        header('location: ../index.php?page=acteurbewerken');
    }
}

?>