<?php
include 'private/connectioncineflex.php';
$sql = "SELECT * FROM films ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM kijkwijzers WHERE active  = 0"; // is voor leeftijden
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();

$sql3 = "SELECT * FROM kijkwijzers 
         WHERE active =1"; //overige
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();

$sql4= "SELECT * FROM genres";
$stmt4 = $conn->prepare($sql4);
$stmt4->execute();

$sql5= "SELECT * FROM acteurs";
$stmt5 = $conn->prepare($sql5);
$stmt5->execute();

$sql6= "SELECT * FROM regisseurs";
$stmt6 = $conn->prepare($sql6);
$stmt6->execute();
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

            <label>Genre</label>
            <select class="form-control"
                    name="genre" id="genre">
                <?php while ($r4 = $stmt4->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $r4['genre_id'] ?>"><?= $r4['genre'] ?></option>
                <?php } ?>
            </select>


        <label>Kijkwijzers leeftijd</label>
        <select class="form-control"
                name="leeftijd" id="leeftijd">
            <?php while ($r2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $r2['naam'] ?>"><?= $r2['naam'] ?></option>
            <?php } ?>
        </select>
        <label>Kijkwijzers</label>
        <select multiple class="form-control" style="height: 50%"
                name="kijkwijzers[]" id="kijkwijzers">
            <?php while ($r3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $r3['kijkwijzer_id'] ?>"><?= $r3['naam'] ?></option>
            <?php } ?>
        </select>

            <label>Acteurs</label>
            <select multiple class="form-control" style="height: 50%"
                    name="acteurs[]" id="acteurs">
                <?php while ($r5 = $stmt5->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $r5['acteur_id'] ?>"><?= $r5['naam'] ?></option>
                <?php } ?>
            </select>

            <label>Regisseurs</label>
            <select multiple class="form-control" style="height: 50%"
                    name="regisseurs[]" id="regisseurs">
                <?php while ($r6 = $stmt6->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $r6['regisseur_id'] ?>"><?= $r6['naam'] ?></option>
                <?php } ?>
            </select>

        <button type="submit">Submit</button>
   </form>
</div>


