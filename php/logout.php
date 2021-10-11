<?php
session_start();
unset($_SESSION['rol']);
unset($_SESSION['voornaam']);
unset($_SESSION['medewerker_id']);
unset($_SESSION['id']);

header('location: ../index.php?page=home');
?>