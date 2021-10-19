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
<script>
    const container = document.querySelector('.container');
    const seats = document.querySelectorAll('.row .seat:not(.occupied)');
    const count = document.getElementById('count');
    const total = document.getElementById('total');
    const movieSelect = document.getElementById('movie');

    populateUI();

    let ticketPrice = +movieSelect.value;

    // Save selected movie index and price

    function setMovieData(movieIndex, moviePrice) {
        localStorage.setItem('selectedMovieIndex', (movieIndex));
        localStorage.setItem('selectedMoviePrice', (moviePrice));
    }

    // Update total and count
    function updateSelectedCount() {
        const selectedSeats = document.querySelectorAll('.row .seat.selected');

        // Copy selected seat into an array
        // Map through the array
        // Return a new array indexes

        const seatsIndex = [...selectedSeats].map((seat) =>{
            return [...seats].indexOf(seat)
        })

        localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));

        const selectedSeatsCount = selectedSeats.length;

        count.innerText = selectedSeatsCount;
        total.innerText = selectedSeatsCount * ticketPrice;
    }

    // Get data from localstorage and populate the UI

    function populateUI() {
        const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

        if (selectedSeats !== null && selectedSeats.length > 0) {
            seats.forEach((seat, index) => {
                if (selectedSeats.indexOf(index) > -1) {
                    seat.classList.add('selected');
                }
            });
        }

        const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

        if(selectedMovieIndex !== null) {
            movieSelect.selectedIndex = selectedMovieIndex;
        }
    }

    //Movie Select Event
    movieSelect.addEventListener('change', (e) => {
        ticketPrice = +e.target.value;
        setMovieData(e.target.selectedIndex, e.target.value);
        updateSelectedCount();
    })

    // Seat click event
    container.addEventListener('click', (e) => {
        if (e.target.classList.contains('seat') &&
            !e.target.classList.contains('occupied')
        ) {
            e.target.classList.toggle('selected');

            updateSelectedCount()
        }
    })

    // Initial count and total set

    updateSelectedCount();
</script>
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

WHERE planning_id = :planning_id";

$stmt = $conn->prepare($sql);
$stmt->execute(array(
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
                            <?php while ($r = $stmt->fetch()) { ?>
                            <ol class="seats">
                                <li class="seat">
                                        <input type="hidden" name="planning" value="<?= $r['planning'] ?>"></input>
                                        <input type="checkbox" value="<?php echo $r['zaal_stoel_id']; ?>" name="stoelid[]"/>
                                        <label for="<?php echo $r['zaal_stoel_id']; ?>"><?php echo $r['zaal_stoel_id']; ?></label>
                                </li>
                            </ol>
                        <?php } ?>
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