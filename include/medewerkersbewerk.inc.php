<?php 
include "private/connectioncineflex.php";

$id     = $_POST['id'];

$sql = "SELECT * FROM `medewerkers` 
WHERE medewerker_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $id
));
$r = $stmt->fetch();
?>

<form class="maxform" action="php/medewerkerbewerk.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $id ?>">

<br><br>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
    <div class="text-light">
        <h1>Medewerker bewerken</h1>
            <div class="user-box">
                <label>Voornaam</label>
                <input type="text" value="<?php echo $r['voornaam'] ?>"  name="voornaam" class="form-control" required="">
            </div>
        
            <div class="user-box">
                <label>Achternaam</label>
                <input type="text" value="<?php echo $r['achternaam'] ?>" name="achternaam" class="form-control" required="">
            </div>

            <div class="user-box">
                <label>E-mail</label>
                <input type="text" value="<?php echo $r['email'] ?>"  name="email"  class="form-control" required="">
            </div>

            <div class="user-box">
                <label>Wachtwoord</label>
                <input type="password" value="<?php echo $r['wachtwoord'] ?>"  name="wachtwoord"  class="form-control" required="">
            </div>

<input type="submit" name="submit" value="Bewerk">

</form>
</div>