<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cineflex</title>

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
                    <?php
                        unset($_SESSION['page']);
                        if (isset($_SESSION['newuser'])) {
                        ?> <h6 data-aos="fade-up" data-aos-delay="300"> <?php $_SESSION['newuser'];
                        session_unset();
                        }
                        ?>
                        <h6 data-aos="fade-up" data-aos-delay="300">Films Planning</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Tijd om te plannen.</h1>

                        <a href="#schedule" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Plan nu.</a>

                </div>
            </div>

        </div>
    </div>
</section>

<?php
    include 'include/planning.inc.php';
?>

<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>