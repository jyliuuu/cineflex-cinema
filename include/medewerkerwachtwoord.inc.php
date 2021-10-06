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

<form class="maxform" action="php/medewerkerbewerkwachtwoord.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $id ?>">

<br><br>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
    <div class="text-light">
        <h1>Medewerker wachtwoord</h1>
        <?php if (isset($_SESSION['error'])) { ?> 
    <p><?php echo $_SESSION['error'];
            unset($_SESSION['error']); 
    }?></p>
            <input type="hidden" value="<?php echo $r['medewerker_id'] ?>" name="id">

            <div class="user-box">
                <label>Wachtwoord</label>
                <input type="password" value=""  name="wachtwoord"  class="form-control" required="">
            </div>

<input type="submit" name="submit" value="Bewerk wachtwoord">

</form>
</div>