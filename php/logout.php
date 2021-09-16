<?php
session_start();
unset($_SESSION['rol']);
unset($_SESSION['voornaam']);
unset($_SESSION['medewerker_id']);
unset($_SESSION['klant_id']);

header('location: ../index.php?page=home');
?>