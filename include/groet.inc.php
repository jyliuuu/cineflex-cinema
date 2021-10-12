<!DOCTYPE html>
<html lang="en">
<?php
// unset $page=login var to prevent for using it for all the pages
session_start();
unset($_SESSION['page']);
?>
<head>

    <title>Cineflex.welkom</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<!-- HERO -->
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

<div class="bg-overlay"></div>

<div class="container">
    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto col-12">
            <div class="hero-text mt-5 text-center">

                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Welkom Terug, <?= $_SESSION['voornaam'] ?>.</h1>
                    <?php 
                    if ($_SESSION['rol'] == 1) { ?>
                        <h6 data-aos="fade-up" data-aos-delay="600">Weer eens aan de slag.</h6>
                    <?php
                    } else if ($_SESSION['rol'] == 2) { ?>
                        <h6 data-aos="fade-up" data-aos-delay="600">Weer eens aan de slag.</h6>
                        <a href="index.php?page=filmsoverzicht" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Aan de slag!</a>
                    <?php
                    } else { ?>
                        <h6 data-aos="fade-up" data-aos-delay="600">Filmpje Pakken?</h6>
                        <a href="index.php?page=filmsoverzicht" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Nu Kijken</a>

                        <a href="index.php?page=filmsplanning" class="btn custom-btn bordered mt-3" data-aos="fade-up"
                        data-aos-delay="700">Zie Planning</a> <?php
                    } ?>
            </div>
        </div>

    </div>
</div>

<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>