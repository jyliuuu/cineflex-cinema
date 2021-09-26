<?php
include 'private/connectioncineflex.php';
$sql = "SELECT * FROM films ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM kijkwijzers WHERE active  = 0"; // is voor leeftijden
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$sql3 = "SELECT * FROM kijkwijzers WHERE active  = 1";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();

$sql3 = "SELECT * FROM kijkwijzers 
         WHERE active =1"; //overige
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
?>
<br><br>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
    <div class="text-light">
        <h1>Films Toevoegen</h1>
        <form class="maxform" action="php/filmstoevoegen.php" method="post" enctype="multipart/form-data">
            <div class="user-box">
                <label>Titel</label>
                <input type="text" name="titel" class="form-control" required="">
            </div>
            <div class="user-box">
                <input type="file" name="poster" required="">
            </div>
            <br>

            <div class="user-box">
                <label>Omschrijving</label>
                <input type="text" name="omschrijving" class="form-control" required="">
            </div>

            <div class="user-box">
                <label>Duratie</label>
                <input type="text" name="duratie" class="form-control" maxLength="3" required="">
            </div>

     <!--   <div class="user-box">
            <button class="btn btn-secondary dropdown-toggle" name="leeftijden" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                leeftijden
            </button>
            <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton1">
                <li class="dropdown-item"  value="">12+ </li>
                <li class="dropdown-item" value="">16+ </li>
                <li class="dropdown-item" value="">18+ </li>
            </ul>
        </div>-->

        <label>Kijkwijzers leeftijd</label>
        <select class="form-control"
                name="leeftijd" id="leeftijd">
            <?php while ($r = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $r['naam'] ?>"><?= $r['naam'] ?></option>
            <?php } ?>
        </select>
        <label>Kijkwijzers</label>
        <select multiple class="form-control" style="height: 50%"
                name="kijkwijzers[]" id="teams">

            <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $r['kijkwijzer_id'] ?>"><?= $r['naam'] ?></option>
            <?php } ?>
        </select>

        <button type="submit">Submit</button>
    </form>
</div>


