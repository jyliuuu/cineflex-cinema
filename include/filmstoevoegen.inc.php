<?php
include 'private/connectioncineflex.php';
$sql = "SELECT * FROM films ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM kijkwijzers";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();

?>

<link rel="stylesheet" href="../css/style.css">
<div class="login-box maxform">
    <h2>Registratie</h2>
    <form class="maxform" action="php/filmstoevoegen.php" method="post" enctype="multipart/form-data">
        <div class="user-box">
            <input type="text" name="titel" required="">
            <label>titel</label>
        </div>
        <div class="user-box">
            <input type="file" name="poster" required="">

        </div>
        <div class="user-box">
            <input type="text" name="omschrijving" required="">
            <label>omschrijving</label>
        </div>

        <div class="user-box">
            <input type="time" name="duratie" required="">
            <label>duratie</label>
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
        <div class="user-box">
            <select name="kijkwijzers" id="cars">
                <option value="">discriminatie</option>
                <option value="">angst</option>
                <option value="">drugs</option>
                <option value="">geweld</option>
                <option value="">grof taalgebruik</option>
                <option value="">seks</option>
            </select>
        </div>
<br>
        <div class="user-box">
            <select name="leeftijden" id="cars">
                <option value="">AL+</option>
                <option value="">6</option>
                <option value="">9</option>
                <option value="">12</option>
                <option value="">14</option>
                <option value="">16</option>
                <option value="">18</option>
            </select>
        </div>



        <button type="submit">Submit</button>
    </form>
</div>


