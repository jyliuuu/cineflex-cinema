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
}
?>

<body>

<?php include 'include/navbar.inc.php'; ?>

<?php include 'include/home.inc.php'; ?>

<?php include "include/" . $page . ".inc.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</body>
</html>
