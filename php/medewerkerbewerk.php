<?php 
require "../private/connectioncineflex.php";
session_start();

$voornaam   = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email      = $_POST['email'];
$id         = $_POST['acc_id'];


$sql = "SELECT *
FROM klanten
WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->execute(array(   
    ':email'    => $email
));

$sql2 = "SELECT *
FROM medewerkers
WHERE email = :email";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute(array(
    ':email'    => $email
));

$sql3 = "SELECT *
FROM klanten";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();

$sql4 = "SELECT *
FROM medewerkers";
$stmt4 = $conn->prepare($sql4);
$stmt4->execute();

$r  = $stmt->fetch();
$r2 = $stmt2->fetch();


$rowCount = $stmt3->rowCount();
$rowCount2 = $stmt4->rowCount();

if($email == $r['email']) {

    $sql3 = "UPDATE medewerkers

    SET voornaam    = :voornaam,
    achternaam      = :achternaam

    WHERE medewerker_id = :id";

    $stmt3 = $conn->prepare($sql3);
    $result3 = $stmt3->execute(array(
        ':voornaam' => $voornaam,
        ':achternaam' => $achternaam,
        ':id' => $id
    ));
    if ($result3) {
        echo 'Successfully edited';
        header('location: ../index.php?page=medewerkers');
    } else {
        echo 'Something went wrong with the connection';
        header('location: ../index.php?page=medewerkersbewerk&acc_id=' . $id . '');
    }
}
else if($email == $r2['email']) {
    $sql4 = "UPDATE medewerkers

    SET voornaam    = :voornaam,
    achternaam      = :achternaam

    WHERE medewerker_id = :id";

    $stmt4 = $conn->prepare($sql4);
    $result4 = $stmt4->execute(array(
        ':voornaam' => $voornaam,
        ':achternaam' => $achternaam,
        ':id' => $id
    ));
    if ($result4) {
        echo 'Successfully edited';
        header('location: ../index.php?page=medewerkers');
    } else {
        echo 'Something went wrong with the connection';
        header('location: ../index.php?page=medewerkersbewerk&acc_id=' . $id . '');
    }
}
    else {
        if ($rowCount > 0) {
            $_SESSION['error'] = "email bestaat al";
            header('location: ../index.php?page=medewerkersbewerk&acc_id=' . $id . ''); //gebruik database info inplaats van post
        } else if ($rowCount2 > 0) {
            $_SESSION['error'] = "email bestaat al";
            header('location: ../index.php?page=medewerkersbewerk&acc_id=' . $id . '');
        } else {
            $sql6 = "UPDATE medewerkers

SET voornaam    = :voornaam,
achternaam      = :achternaam,
email           = :email

WHERE medewerker_id = :id";

            $stmt6 = $conn->prepare($sql6);
            $result = $stmt6->execute(array(
                ':voornaam' => $voornaam,
                ':achternaam' => $achternaam,
                ':email' => $email,
                ':id' => $id
            ));

// echo "<pre>", print_r($), "</pre>";

            if ($result) {
                echo 'Successfully edited';
                header('location: ../index.php?page=medewerkers');
            } else {
                echo 'Something went wrong with the connection';
                header('location: ../index.php?page=medewerkersbewerk&acc_id=' . $id . '');
            }
        }
    }

?>