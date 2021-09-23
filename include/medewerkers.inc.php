<?php 
include "private/connectioncineflex.php";

$sql = "SELECT * 
FROM medewerkers";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<a href = "index.php?page=medewerkeraanemen">
  <input class="btn btn-success" type="submit" name="" value="Aannemen">

<?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<th> Naam: </th>
<th> Achternaam: </th>
<th> E-mail:    </th>
<br>
<td> <?php echo $r['voornaam'] ?></td>
<td> <?php echo $r['achternaam'] ?></td>
<td> <?php echo $r['email'] ?></td>

<td> 
<form action="index.php?page=medewerkersbewerk" method="POST">
<input type="hidden" name="id" value="<?php echo $r['medewerker_id'] ?>">
<button class="btn btn-primary">Bewerken</button>
</form>

<td> 
<form action="../php/medewerkersontslaan.php" method="POST">
<input type="hidden" name="id" value="<?php echo $r['medewerker_id'] ?>">
<button class="btn btn-warning">Ontslaan</button>
</form>
<?php } ?>
