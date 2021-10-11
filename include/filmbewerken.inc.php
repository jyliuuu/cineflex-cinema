<?php
include 'private/connectioncineflex.php';

$id = $_POST['film_id'];

$sql = "SELECT * 
        FROM films 
        WHERE film_id = :filmid";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':filmid'=> $id
));

$sql2 = "SELECT * 
         FROM kijkwijzers
         WHERE active =0"; //leeftijden
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();

$sql3 = "SELECT * 
         FROM kijkwijzers 
         WHERE active =1"; //overige
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();

$sql4= "SELECT * FROM genres";
$stmt4 = $conn->prepare($sql4);
$stmt4->execute();

$r0 = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<br><br>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
    <div class="text-light">
        <h1>Films Bewerken</h1>
        <form class="maxform" action="php/filmsbewerken.php" method="post" enctype="multipart/form-data">
            <div class="user-box">
                <label>Titel</label>
                <input type="text" name="titel" value="<?= $r0['titel'] ?>" class="form-control" required="">
            </div>
            <div class="user-box">
                <input type="file" name="poster">
            </div>
            <br>

            <div class="user-box">
                <label>Omschrijving</label>
                <input type="text" name="omschrijving" value="<?= $r0['omschrijving'] ?>" class="form-control" required="">
            </div>

            <div class="user-box">
                <label>Duratie</label>
                <input type="text" name="duratie" value="<?= $r0['duratie'] ?>" class="form-control" maxLength="3" required="">
            </div>

            <label>Genre</label>
            <select class="form-control"
                    name="genre" id="genre">
                <?php while ($r4 = $stmt4->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $r4['genre_id'] ?>"><?= $r4['genre'] ?></option>
                <?php } ?>
            </select>

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
            <div class="user-box">
                <label>Kijkwijzers</label>
                    <select multiple name="kijkwijzers[]" class="form-control" id="kijkwijzers">
                <?php 
                while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $r['kijkwijzer_id'] ?>"><?= $r['naam'] ?></option><?php
                } ?>
                </select>
            </div>
    <br>
            <div class="user-box">
                <label>Kijkwijzers leeftijd</label>
                <select name="leeftijd" class="form-control" id="kijkwijzers">
                <?php 
                while ($r2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $r2['kijkwijzer_id'] ?>"><?= $r2['naam'] ?></option><?php
                } ?>
                </select>
            </div>
        </div>
        <br>
        <input type="hidden" name="film_id" value="<?= $r0['film_id'] ?>">
        <button class="btn-success" type="submit">Submit</button>
    </form>
</div>


