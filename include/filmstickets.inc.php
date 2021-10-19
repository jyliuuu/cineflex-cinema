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

<?php
$sql = "SELECT p.zaal_id, zaal_stoel_id
FROM planning p

INNER JOIN zalen z
ON p.zaal_id = z.zaal_id

INNER JOIN zaal_stoel zs
ON z.zaal_id = zs.zaal_id

WHERE planning_id = :planning_id";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
        ':planning_id'  => $_POST['planning']
));



?>


<section class="feature" id="feature">
    <div class="container">

        <div class="theatre">
            <div class="screen-side">
                <div class="screen">Scherm</div>
                <h3 class="select-text">Selecteer hier uw stoel</h3>
            </div>
            <div class="exit exit--front">
            </div>


            <ol class="cabin">

                <li class="row row--1">
                    <?php while ($r = $stmt->fetch()) { ?>
                    <ol class="seats" type="1">
                        <li class="seat">

                            <input type="checkbox" id="<?php echo $r['zaal_stoel_id']; ?>" />
                            <label for="<?php echo $r['zaal_stoel_id']; ?>"><?php echo $r['zaal_stoel_id']; ?></label>
                        </li>
                    </ol>
                    <?php } ?>

<!--                </li>-->
<!--                <li class="row row--2">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="2A" />-->
<!--                            <label for="2A">2A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="2B" />-->
<!--                            <label for="2B">2B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="2C" />-->
<!--                            <label for="2C">2C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="2D" />-->
<!--                            <label for="2D">2D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="2E" />-->
<!--                            <label for="2E">2E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="2F" />-->
<!--                            <label for="2F">2F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--3">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="3A" />-->
<!--                            <label for="3A">3A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="3B" />-->
<!--                            <label for="3B">3B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="3C" />-->
<!--                            <label for="3C">3C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="3D" />-->
<!--                            <label for="3D">3D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="3E" />-->
<!--                            <label for="3E">3E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="3F" />-->
<!--                            <label for="3F">3F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--4">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="4A" />-->
<!--                            <label for="4A">4A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="4B" />-->
<!--                            <label for="4B">4B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="4C" />-->
<!--                            <label for="4C">4C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="4D" />-->
<!--                            <label for="4D">4D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="4E" />-->
<!--                            <label for="4E">4E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="4F" />-->
<!--                            <label for="4F">4F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--5">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="5A" />-->
<!--                            <label for="5A">5A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="5B" />-->
<!--                            <label for="5B">5B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="5C" />-->
<!--                            <label for="5C">5C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="5D" />-->
<!--                            <label for="5D">5D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="5E" />-->
<!--                            <label for="5E">5E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="5F" />-->
<!--                            <label for="5F">5F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--6">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="6A" />-->
<!--                            <label for="6A">6A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="6B" />-->
<!--                            <label for="6B">6B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="6C" />-->
<!--                            <label for="6C">6C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="6D" />-->
<!--                            <label for="6D">6D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="6E" />-->
<!--                            <label for="6E">6E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="6F" />-->
<!--                            <label for="6F">6F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--7">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="7A" />-->
<!--                            <label for="7A">7A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="7B" />-->
<!--                            <label for="7B">7B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="7C" />-->
<!--                            <label for="7C">7C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="7D" />-->
<!--                            <label for="7D">7D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="7E" />-->
<!--                            <label for="7E">7E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="7F" />-->
<!--                            <label for="7F">7F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--8">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="8A" />-->
<!--                            <label for="8A">8A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="8B" />-->
<!--                            <label for="8B">8B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="8C" />-->
<!--                            <label for="8C">8C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="8D" />-->
<!--                            <label for="8D">8D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="8E" />-->
<!--                            <label for="8E">8E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="8F" />-->
<!--                            <label for="8F">8F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--9">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="9A" />-->
<!--                            <label for="9A">9A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="9B" />-->
<!--                            <label for="9B">9B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="9C" />-->
<!--                            <label for="9C">9C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="9D" />-->
<!--                            <label for="9D">9D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="9E" />-->
<!--                            <label for="9E">9E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="9F" />-->
<!--                            <label for="9F">9F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
<!--                <li class="row row--10">-->
<!--                    <ol class="seats" type="A">-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="10A" />-->
<!--                            <label for="10A">10A</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="10B" />-->
<!--                            <label for="10B">10B</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="10C" />-->
<!--                            <label for="10C">10C</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="10D" />-->
<!--                            <label for="10D">10D</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="10E" />-->
<!--                            <label for="10E">10E</label>-->
<!--                        </li>-->
<!--                        <li class="seat">-->
<!--                            <input type="checkbox" id="10F" />-->
<!--                            <label for="10F">10F</label>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </li>-->
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