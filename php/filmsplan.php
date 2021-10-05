<?php

require "../private/connectioncineflex.php";

$filmid = $_POST['film'];
$zaal = $_POST['zaal'];
$starttijd = $_POST['start'];
$duratie = $_POST['duratie'];
$datum = $_POST['datum'];
echo "<pre>", print_r($_POST), "</pre>";

// for time converts
$hours = floor($duratie / 60);
$min = $duratie - ($hours * 60);
$newtimeh = $hours;
$newtimem = $min + 10;
$time = new DateTime("$starttijd");
$time->add(new DateInterval('PT' . $newtimem . 'MPT' . $newtimeh . 'H'));
$Date = $time->format('H:i'); //eindtijd

echo $Date;

    $sql = "SELECT *
            FROM planning
            WHERE datum = :datum AND zaal_id = :zaalid AND (:begintijd >= begin_tijd AND :begintijd <= eind_tijd)
            OR :eindtijd >= begin_tijd AND :eindtijd <= eind_tijd"; 
    $smt = $conn->prepare($sql);
    $smt->execute(array(
        ':zaalid' => $zaal,    
        ':datum' => $datum,
        ':begintijd' => $starttijd,
        ':eindtijd' => $Date
    ));
    $r = $smt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>", print_r($r), "</pre>";

    if ($smt->rowCount() == 0) 
    {
        $sql4 = "INSERT INTO planning (film_id, begin_tijd, eind_tijd, zaal_id, datum) 
        VALUE (:film_id, :begin_tijd, :eind_tijd, :zaal_id, :datum)";
        $smt4 = $conn->prepare($sql4);
        $smt4->execute(array(
            ':film_id' => $filmid,
            ':begin_tijd' => $starttijd,
            ':eind_tijd' => $Date,    
            ':zaal_id' => $zaal,
            ':datum' => $datum
        ));
        header('location: ../index.php?page=filmsplanning');
    }
    else
    {
        $_SESSION['error'] = "IS AL VOL LMAO";
        header('location: ../index.php?page=filmsplanning');
    }