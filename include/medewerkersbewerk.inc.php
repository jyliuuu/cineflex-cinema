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

<form action="php/medewerkerbewerk.php" method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<td>Voornaam: </td>
<input type="text" placeholder="Voornaam" name="voornaam" value="<?php echo $r['voornaam'] ?>" required>

<td>Achternaam: </td>
<input type="text" placeholder="Achternaam" name="achternaam" value="<?php echo $r['achternaam'] ?>" required>

<td>Email: </td>
<input type="text" placeholder="Email" name="email" value="<?php echo $r['email'] ?>" required>

<td>Wachtwoord: </td>
<input type="password" placeholder="Wachtwoord" name="wachtwoord" value="<?php echo $r['wachtwoord'] ?>" required>

<input type="submit" class="btn btn-primary" name="submit" value="Bewerk">

</form>
