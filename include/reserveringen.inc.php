
<?php 
require "private/connectioncineflex.php"; 
// WORK IN PROGRESS . . . 
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
<?php
        if (isset($_SESSION['melding'])) {
            echo '<div class="freespacexm"></div><div class="txtboxLalign alert alert-success" role="alert">'.$_SESSION['melding'].'</div>';
            unset($_SESSION['melding']);
        } else if (isset($_SESSION['melding2'])) {
            echo '<div class="freespacexm"></div><div class="txtboxLalign alert alert-danger" role="alert">'.$_SESSION['melding2'].'</div>';
            unset($_SESSION['melding2']);
        } else {

        }
?>
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

    <div class="bg-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto col-12">
                <div class="hero-text mt-5 text-center">
                        <h6 data-aos="fade-up" data-aos-delay="300">Reserveringen</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Laten we gaan!
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
        
    <table class="txtalign" style="width:100%">

        <tr class="text-light">
            <th>Klant naam</th>
            <th>Film</th>
            <th>Tijden</th>
            <th>Datum</th>
            <th>Zaal</th>
            <th>Stoel nummer</th>
            <th>Acties</th>
        </tr>
        <?php
            $klantid = $_SESSION['id'];
            if ($_SESSION['rol'] == 3) {
                $sql = 'SELECT *
                FROM reserveringen r
                INNER JOIN klanten k
                ON r.klant_id = k.klant_id
                INNER JOIN planning p 
                ON r.planning_id = p.planning_id
                INNER JOIN films f
                ON p.film_id = f.film_id
                WHERE k.klant_id = :klantid';
                $sth = $conn->prepare($sql);
                $sth->execute(array(
                    ':klantid' => $klantid
                ));
            }
            else {
                $sql = 'SELECT *
                FROM reserveringen r
                INNER JOIN klanten k
                ON r.klant_id = k.klant_id
                INNER JOIN planning p 
                ON r.planning_id = p.planning_id
                INNER JOIN films f
                ON p.film_id = f.film_id';
                $sth = $conn->prepare($sql);
                $sth->execute();
            }

            while ($r = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td class="text-white"><?php echo $r['voornaam'] ?></td>
            <td class="text-white"><?php echo $r['titel'] ?></td>
            <td class="text-white"><?php echo $r['begin_tijd'] ?> - <?= $r['eind_tijd'] ?></td>
            <td class="text-white"><?php echo $r['datum'] ?></td>
            <td class="text-white"><?php echo $r['zaal_id'] ?></td>
            <td class="text-white"><?php echo $r['stoel_id'] ?></td>
            <td>
                <form action="PHP/ticketannuleren.php" method="POST">
                    <input type="hidden" name="stoelid" value="<?php echo $r['stoel_id'] ?>">
                    <input type="hidden" name="planningid" value="<?php echo $r['planning_id'] ?>">
                    <button type="submit" class="btn btn-danger" value="Submit">Annuleren</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>