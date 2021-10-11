<!DOCTYPE html>
<html lang="en">
<?php 
require "private/connectioncineflex.php"; 
?>

<head>
    <title>Cineflex</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<!-- HERO -->
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

    <div class="bg-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto col-12">
                <div class="hero-text mt-5 text-center">
                        <h6 data-aos="fade-up" data-aos-delay="300">Films overzicht</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Ready, Set, Kijken!
                        </h1>

                        <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">
                            Kom maar op!
                        </a> 
                </div>
            </div>

        </div>
    </div>
</section>

<section class="feature" id="feature">
    <div class="container">
    <?php if ($_SESSION['rol'] == "3") { ?>

    <?php } else { ?>
        <form action="index.php?page=filmstoevoegen" method="POST">
        <button type="submit" class="btn btn-success" value="Submit">Voeg Nieuw</button>
        </form>
    <?php } ?>
        
    <table class="txtalign" style="width:100%">

    <tr class="text-light">
        <th>Poster</th>
        <th>Titel</th>
        <th>Duratie</th>
        <th>Acties</th>
    </tr>
    <?php
        $today = date("L-m-d", strtotime('now')); // OK
        $todaytime = date("H:i:s", strtotime('now'));
        // $sql = 'SELECT *
        // FROM films 
        // INNER JOIN films_kijkwijzers
        // ON films.film_id = films_kijkwijzers.film_id
        // INNER JOIN kijkwijzers
        // ON films_kijkwijzers.kijkwijzer_id = kijkwijzers.kijkwijzer_id';
        $sql = 'SELECT *
        FROM films';
        $sth = $conn->prepare($sql);
        $sth->execute();

        $sql2 = 'SELECT *
        FROM films';
        $sth2 = $conn->prepare($sql2);  
        $sth2->execute();

        $sql3 ="DELETE FROM planning
            WHERE begin_tijd >= :starttijd AND datum = :datum";
        $smt3 = $conn->prepare($sql3);
        $smt3->execute(array(
            ':starttijd' => $todaytime,
            ':datum' => $today
        ));

        while ($r = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td>
            <img data-aos="fade-up" data-aos-delay="100" id="s_img" src="data:image/png;base64,<?= $r['poster']?>" height=900 width=300/> 
        </td>
            <td data-aos="fade-up" data-aos-delay="200" class="text-white"><?php echo $r['titel'] ?></td>
            <td data-aos="fade-up" data-aos-delay="400" class="text-white"><?php echo $r['duratie'] ?></td>
        <?php 
        if ($_SESSION['rol'] == "3") { ?>
            <td>
                <form action="index.php?page=filmbekijken" method="POST">
                    <input type="hidden" name="filmid" value="<?php echo $r['film_id'] ?>">
                    <button type="submit" class="btn btn-success" value="Submit">Bekijken</button>
                </form>
            </td>
        <?php } else { ?>
            <td>
                <form action="index.php?page=filmbewerken" method="POST">
                    <input type="hidden" name="film_id" value="<?php echo $r['film_id'] ?>">
                    <button type="submit" class="btn btn-warning" value="Submit">Bewerken</button>
                </form>
            </td>
            <td>
                <form action="PHP/filmverwijderen.php" method="POST">
                    <input type="hidden" name="film_id" value="<?php echo $r['film_id'] ?>">
                    <input type="hidden" name="tname" value="<?php echo $r['titel'] ?>">
                    <button type="submit" class="btn btn-danger" value="Submit">Verwijderen</button>
                </form>
            </td>
        <?php } ?>
            
    </tr>
    <?php } ?>
</table>
<br>
<hr>
<br>
<br>
<?php if ($sth->rowcount() == 0) { ?>
    <div class="textcenter">
        <br>
        <h6 class="text-light">Er zijn momenteel geen films beschikbaar.</h6>
    </div>
<?php } else { ?>
   <?php } ?>
    </table>

    </div>
</section>
<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>