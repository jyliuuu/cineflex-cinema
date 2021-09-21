<?php 
include "../private/connectioncineflex.php";

$id     = $_POST['id'];

$sql = "SELECT * 
FROM medewerkers
WHERE = medewerker_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'   => $id
));
?>

<form action="../php/medewerkerbewerk.php" method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>">

<td>Voornaam: </td>
<input type="text" placeholder="Voornaam" name="voornaam" value="<?php echo $r['voornaam'] ?>" required>

<td>Achternaam: </td>
<input type="text" placeholder="Voornaam" name="achternaam" value="<?php echo $r['achternaam'] ?>" required>

<td>Voornaam: </td>
<input type="text" placeholder="Voornaam" name="email" value="<?php echo $r['email'] ?>" required>

<input type="subtmit" name="submit" value="Bewerk">

</form>
