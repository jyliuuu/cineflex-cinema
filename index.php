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
    $page = 'home';
    $_SESSION['page'] = $page;
}
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/aos.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="css/style.css">
    <body>
        <?php 
            include "include/" . $page . ".inc.php"; 
            
            if ($_SESSION['rol'] == 3) {
                include 'include/navbar2.inc.php'; //CREATE
            } else if ($_SESSION['rol'] == 2) {
                include 'include/navbar2.inc.php';
            } else if ($_SESSION['rol'] == 1) {
                include 'include/navbar2.inc.php';
            } else {
                include 'include/navbar.inc.php';
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </body>
</html>