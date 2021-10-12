<?php
include "private/connectioncineflex.php";

$id    = $_GET["regisseur_id"];

$sql = "SELECT * FROM `regisseurs` 
WHERE regisseur_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $id
));
$r = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="freespaces"></div>
<form class="maxform" action="php/regisseurbewerken.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $id ?>">

    <br><br>
    <link rel="stylesheet" href="../css/style.css">
    <div class="container">
        <div class="text-light">
            <h1>Regisseur bewerken</h1>
            <?php if (isset($_SESSION['error'])) { ?>
            <p><?php echo $_SESSION['error'];
                unset($_SESSION['error']);
                }?></p>
            <input type="hidden" value="<?php echo $r['regisseur_id'] ?>" name="id">

            <div class="user-box">
                <label>Naam:<br><br> <?php echo $r['naam']; ?></label>
                <input type="text" name="naam" class="form-control" required="">
            </div>



            <input class="btn btn-primary" type="submit" name="submit" value="Bewerk">

</form>
</div>