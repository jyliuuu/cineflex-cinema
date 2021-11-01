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
$seats[0] = "1";
$seats[1] = "2";
$seats[2] = "3";
$seats[3] = "4";
$seats[4] = "5";
$seats[5] = "6";
$seats[6] = "7";
$seats[7] = "8";
$seats[8] = "9";
$seats[9] = "10";
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
                        <h6 data-aos="fade-up" data-aos-delay="300">Stoelen kiezen.</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Jouw eigen keuze.</h1>

                </div>
            </div>

        </div>
    </div>
</section>

<?php
$sql = "SELECT p.zaal_id, zaal_stoel_id, p.planning_id AS planning
FROM planning p

INNER JOIN zalen z
ON p.zaal_id = z.zaal_id

INNER JOIN zaal_stoel zs
ON z.zaal_id = zs.zaal_id

WHERE planning_id = :planning_id
AND active = 0
ORDER BY zaal_stoel_id";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':planning_id'  => $_POST['planning']
));

$sql2 = "SELECT r.klant_id, p.zaal_id, zaal_stoel_id, p.planning_id AS planning
FROM planning p

INNER JOIN zalen z
ON p.zaal_id = z.zaal_id

INNER JOIN zaal_stoel zs
ON z.zaal_id = zs.zaal_id

INNER JOIN reserveringen r
ON p.planning_id = r.planning_id

WHERE r.planning_id = :plan";

$stmt2 = $conn->prepare($sql2);
$stmt2->execute(array(
    ':plan'  => $_POST['planning']
));
$r2 = $stmt2->rowCount();

$sql3 = "SELECT p.zaal_id, zaal_stoel_id, p.planning_id AS planning
FROM planning p

INNER JOIN zalen z
ON p.zaal_id = z.zaal_id

INNER JOIN zaal_stoel zs
ON z.zaal_id = zs.zaal_id

WHERE planning_id = :planning_id
AND active = '1'
ORDER BY zaal_stoel_id";

$stmt3 = $conn->prepare($sql3);
$stmt3->execute(array(
    ':planning_id'  => $_POST['planning']
));

?>
<section class="feature" id="feature">
    <div class="container">
        <div class="theatre">
            <h3 class="text-white select-text">Selecteer hier uw stoel : </h3>
            <div class="screen-side">
                <div class="screen">Scherm</div>
            </div>
            <br>
            <div class="exit exit--front">
            </div>
            <ol class="cabin">
                <form action="php/filmreserveren.php" method="POST">
                    <li class="row row--1">
                        <div class="row">
                            <?php
                            for ($x = 0; $x < 90; $x++) {

                            }
                            ?>
                            <?php
                            while ($r3 = $stmt3->fetch()) { ?>
                            <ol class="seats">
                                <li class="seat-taken">
                                    <input type="hidden" name="planning" value="<?= $r3['planning'] ?>"></input>
                                    <input type="checkbox" disabled value="<?php echo $r3['zaal_stoel_id']; ?>" name="stoelid[]"/>
                                    <label for="<?php echo $r3['zaal_stoel_id']; ?>">X</label>
                                </li>
                            </ol>
                            <?php
                            }
                            while ($r = $stmt->fetch()) { ?>
                                <ol class="seats">
                                    <li class="seat">
                                        <input type="hidden" name="planning" value="<?= $r['planning'] ?>"></input>
                                        <input type="checkbox" value="<?php echo $r['zaal_stoel_id']; ?>" name="stoelid[]"/>
                                        <label for="<?php echo $r['zaal_stoel_id']; ?>"><?php echo $r['zaal_stoel_id']; ?></label>
                                    </li>
                                </ol> <?php
                            } ?>
                        </div>
                        <br>
                    <button class="btn-transform btn-lg btn-danger" type="submit">Reserveer Ticket</button>
                </form>
            </ol>
            <div class="exit exit--back">
            </div>
        </div>
    </div>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>