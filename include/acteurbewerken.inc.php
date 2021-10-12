<?php
include "private/connectioncineflex.php";

$id    = $_GET["acteur_id"];

$sql = "SELECT * FROM `acteurs` 
WHERE acteur_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $id
));
$r = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form class="maxform" action="php/acteurbewerken.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $id ?>">

    <br><br>
    <link rel="stylesheet" href="../css/style.css">
    <div class="freespaces"></div>
    <div class="container">
        <div class="text-light">
            <h1>Acteur bewerken</h1>
            <?php if (isset($_SESSION['error'])) { ?>
            <p><?php echo $_SESSION['error'];
                unset($_SESSION['error']);
                }?></p>
            <input type="hidden" value="<?php echo $r['acteur_id'] ?>" name="id">

            <div class="user-box">
                <label>Huidige naam: <?php echo $r['naam']; ?></label>
                <input type="text" name="naam" class="form-control" required="">
            </div>



            <input class="btn btn-primary" type="submit" name="submit" value="Bewerk">

</form>
</div>