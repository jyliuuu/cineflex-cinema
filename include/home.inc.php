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
<?php
if (isset($_SESSION['melding'])) {
    echo '<div class="freespacexm"></div><div class="txtboxLalign alert alert-danger" role="alert">'.$_SESSION['melding'].'</div>';
    unset($_SESSION['melding']);
} else {

}
?>
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

    <div class="bg-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto col-12">
                <div class="hero-text mt-5 text-center">
                    <?php
                    unset($_SESSION['page']);
                    if (isset($_SESSION['newuser'])) {
                    ?>
                    <h6 data-aos="fade-up" data-aos-delay="300"> <?php $_SESSION['newuser'];
                        session_unset();
                        }
                        ?>
                        <h6 data-aos="fade-up" data-aos-delay="300">Beste plek waar je kan genieten</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Onbeperkt series, films en meer
                            kijken. </h1>

                        <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Start
                            nu</a>

                        <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up"
                           data-aos-delay="700">over ons</a>

                </div>
            </div>

        </div>
    </div>
</section>


<section class="feature" id="feature">
    <div class="container">
        <div class="row">

            <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                <h2 class="mb-3 text-white" data-aos="fade-up">Ben je nieuw bij Cineflex?</h2>

                <h6 class="mb-4 text-white" data-aos="fade-up">Dit maakt opzicht niet heel veel uit.</h6>

                <p data-aos="fade-up" data-aos-delay="200"> Je hoeft geen account te maken als je wilt zien welke films
                    deze week worden gedraaid.<br><br>Indien je tickets wilt reserveren moet je wel een account
                    aanmaken. </p>

                <a href="include/registreren.inc.php" class="btn custom-btn bg-color mt-3" data-aos="fade-up"
                   data-aos-delay="300">klik hier als je account wilt maken</a>
            </div>

            <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                <div class="about-working-hours">
                    <div>

                        <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Openingstijden</h2>

                        <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">maandag tot en met
                            vrijdag</strong>

                        <p data-aos="fade-up" data-aos-delay="800">13:00 - 02:00</p>

                        <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700"> weekend</strong>

                        <p data-aos="fade-up" data-aos-delay="800">13:00 - 02:00</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>


<!-- ABOUT -->
<section class="about section" id="about">
    <div class="container">
        <div class="row">

            <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-12 col-md-12 mx-auto col-12">
                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hallo, wij zijn Cineflex team</h2>

                <p data-aos="fade-up" data-aos-delay="400">Cineflex heeft een uitgebreide catalogus van speelfilms,
                    documentaires, series, anime, bekroonde Netflix Originals en meer. Kijk zoveel je wilt en
                    wanneer je
                    wilt.</p>

                <p data-aos="fade-up" data-aos-delay="500">Je kijkt zo veel je wilt, wanneer je wilt, zonder enige
                    vorm
                    van reclame. En dit allemaal voor één lage prijs per maand. Er valt altijd iets nieuws te
                    ontdekken
                    en elke week worden er nieuwe series en films toegevoegd!</p>

            </div>
            <div class="empty">
                <br>
            </div>
            <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                <div class="team-thumb">
                    <img src="images/team/team-image.jpg" class="img-fluid" alt="Trainer" style="max-height: 270px">

                    <div class="team-info d-flex flex-column">

                        <h3>Huzaifa Balaksi</h3>
                        <span>Software Developer</span>

                        <ul class="social-icon mt-3">
                            <li><a href="https://www.instagram.com" class="fa fa-twitter"></a></li>
                            <li><a href="https://www.instagram.com" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up"
                 data-aos-delay="800">
                <div class="team-thumb">
                    <img src="images/team/jacky.jpg" class="img-fluid" alt="Trainer" style="max-height: 270px">

                    <div class="team-info d-flex flex-column">

                        <h3>Jacky Liu</h3>
                        <span>Software Developer</span>

                        <ul class="social-icon mt-3">
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up"
                 data-aos-delay="800">
                <div class="team-thumb">
                    <img src="images/team/dion.jpg" class="img-fluid" alt="Trainer" style="max-height: 270px">

                    <div class="team-info d-flex flex-column">

                        <h3>Dion Muller</h3>
                        <span>Software Developer</span>

                        <ul class="social-icon mt-3">
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="class section" id="class">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center mb-5">
                <h6 data-aos="fade-up">Film Spotlight</h6>

                <h2 data-aos="fade-up" class="text-white" data-aos-delay="200">beste trending films</h2>
            </div>
            <!-- CLASS -->
            <?php
            include "private/connectioncineflex.php";
            $sql = "SELECT * FROM films 
    /*    inner join films_kijkwijzers AS FK ON films.film_id = FK.film_id
        inner join kijkwijzers as KW ON FK.kijkwijzer_id = KW.kijkwijzer_id*/ ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();




            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="data:image/png;base64,<?= $result['poster'] ?>" style="width: 350px; max-height: 450px"/>
                        <div class="class-info" style="word-wrap: break-word;">
                            <h3 class="mb-1"><?= $result['titel'] ?></h3>
                            <p class="mt-3"><?= $result['omschrijving'] ?>...</p>
                            <?php

                            $sql1 = "SELECT fk.film_id , kw.naam FROM films_kijkwijzers fk
                                     LEFT JOIN kijkwijzers kw ON fk.kijkwijzer_id = kw.kijkwijzer_id WHERE fk.film_id = :film_id ";
                            $stmt1 = $conn->prepare($sql1);
                            $stmt1->execute(array(
                                    ':film_id' => $result['film_id']
                            ));
                            while ($result1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
                            ?>

                            <span class="tag"><?= $result1['naam'] ?></span>
<?php }  ?>
                            <br>
                            <form action="index.php?page=filmbekijken" method="POST">
                                <input type="hidden" value="<?= $result['film_id']; ?>" name="filmid">
                                <button class="btn-danger" type="submit">Bekijk</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
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