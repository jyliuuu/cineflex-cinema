<?php
session_start();
if (isset($_GET['page'])) {
    if ($_GET['page'] == "logout") {
        header('location: php/logout.php');
        die();
    } else {
        $page = $_GET['page'];
    }
} else {
    $page = 'login';
}
?>

<!doctype html>
<link rel="stylesheet" href="style.css">
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Hello, world!</title>
</head>
<body>

<?php /*include 'include/header.inc.php'; */?><!--

<?php /*include 'include/navbar.inc.php'; */?>

--><?php /*include "include/" . $page . ".inc.php"; */?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</body>
</html>
