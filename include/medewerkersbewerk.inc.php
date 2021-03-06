<?php 
include "private/connectioncineflex.php";

$acc_id    = $_GET["acc_id"];

$sql = "SELECT * FROM `medewerkers` 
WHERE medewerker_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $acc_id
));
$r = $stmt->fetch();
?>

<form class="maxform" action="php/medewerkerbewerk.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="acc_id" value="<?php echo $acc_id ?>">

<br><br>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
    <div class="text-light">
        <h1>Medewerker bewerken</h1>
        <?php if (isset($_SESSION['error'])) { ?> 
    <p><?php echo $_SESSION['error'];
            unset($_SESSION['error']); 
    }?></p>
            <input type="hidden" value="<?php echo $r['medewerker_id'] ?>" name="id">

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
                <input type="text" value="<?php echo $r['email'] ?>"  name="email"  class="form-control">
            </div>

            <?php echo '<a href="index.php?page=medewerkerwachtwoord&acc_id='.$acc_id.'" class="btn btn-primary">bewerk wachtwoord</a><br><br><br><br>'; ?>

<input type="submit" name="submit" value="Bewerk">

</form>
</div>