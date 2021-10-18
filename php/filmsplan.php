<?php
session_start();
require "../private/connectioncineflex.php";

$filmid = $_POST['film'];
$zaal = $_POST['zaal'];
$starttijd = $_POST['start'];
$datum = $_POST['datum'];
$today = date("m-d", strtotime('now')); // OK

$sql0 = "SELECT titel, duratie FROM films WHERE film_id = :film_id";
$smt0 = $conn->prepare($sql0);
$smt0->execute(array(
    ':film_id' => $filmid
));
$r0 = $smt0->fetch(PDO::FETCH_ASSOC);
$duratie = $r0['duratie'];
$titel = $r0['titel'];

// for time converts
$hours = floor($duratie / 60); // uren = minuten / 60 = uren formule
$min = $duratie - ($hours * 60); // min = minuten - (uren * 60 oftewel minuten)
$newtimeh = $hours;
$newtimem = $min + 10; // + 10 voor opruimingstijd
$time = new DateTime("$starttijd"); // starttijd convert
$time->add(new DateInterval('PT' . $newtimem . 'MPT' . $newtimeh . 'H')); // add interval = P(lus) T(ime) :min M(inutes) H(ours) (PTMPTH)
$Date = $time->format('H:i'); //eindtijd
$close = strtotime("02:00am");
$closingtime = date("H:i", $close); // convert + rename

    $sql = "SELECT *
            FROM planning
            WHERE datum = :datum AND zaal_id = :zaalid AND ((:begintijd >= begin_tijd AND :begintijd <= eind_tijd)
            OR (:eindtijd >= begin_tijd AND :eindtijd <= eind_tijd))  ";
    $smt = $conn->prepare($sql);
    $smt->execute(array(
        ':zaalid' => $zaal,    
        ':datum' => $datum,
        ':begintijd' => $starttijd,
        ':eindtijd' => $Date
    ));
    $r = $smt->fetchAll(PDO::FETCH_ASSOC);
    // checkt voor een al ingeplande film
    if ($smt->rowCount() == 0) 
    {
        // checkt of het genoeg tijd heeft voordat Cineflex sluit + start voor sluitingstijd.
        if ($Date > $closingtime && $starttijd < $closingtime) {
            $_SESSION['error'] = "Error: inplannen van '".$titel."' mislukt -> Cineflex sluit voordat de film volledig kan eindigen/beginnen. Cineflex : 13:00 - 02:00 - Film tijd: (".$starttijd." - ".$Date." op ".$datum.")";
            header('location: ../index.php?page=filmsplanning');
        }
        else {
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
            $_SESSION['success'] = "Inplannen van '".$titel."' gelukt -> ingepland op (".$starttijd." - ".$Date." op ".$datum.")";
            header('location: ../index.php?page=filmsplanning');
        }
    }
    else
    {
        $_SESSION['error'] = "Error: inplannen van '".$titel."' mislukt -> er is al een ander film ingepland in die tijd. 
                             (".$starttijd." - ".$Date." op ".$datum.")";
        header('location: ../index.php?page=filmsplanning');
    }