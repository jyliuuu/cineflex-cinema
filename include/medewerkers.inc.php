<?php 
include "private/connectioncineflex.php";

$sql = "SELECT * 
FROM medewerkers
WHERE rol = '2'";
$stmt = $conn->prepare($sql);
$stmt->execute();
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
                        <h6 data-aos="fade-up" data-aos-delay="300">Medewerker overzicht</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Onze geweldige collega's van Cineflex
                        </h1>
                </div>
            </div>

        </div>
    </div>
</section>
  <section class="feature" id="feature">
    <div class="container">
        
    <table class="txtalign" style="width:100%">

    <tr class="text-light">
        <th>Voornaam:</th>
        <th>Achternaam:</th>
        <th>Email:</th>
    </tr>

<?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
<br>
<td class="text-light" data-aos="fade-up" data-aos-delay="100"> <?php echo $r['voornaam'] ?></td>
<td class="text-light" data-aos="fade-up" data-aos-delay="200"> <?php echo $r['achternaam'] ?></td>
<td class="text-light" data-aos="fade-up" data-aos-delay="300"> <?php echo $r['email'] ?></td>

<td>
    <form>
        <?php echo '<a href="index.php?page=medewerkersbewerk&acc_id='.$r['medewerker_id'].'" class="btn btn-primary">Bewerk</a>'; ?>
    </form>
</td>
<td> 
    <form action="php/medewerkersontslaan.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $r['medewerker_id'] ?>">
        <button class="btn btn-danger">Ontslaan</button>
    </form>
</td>
</tr>
<?php } ?>
    <a href = "index.php?page=medewerkeraanemen">
    <input class="btn btn-success" type="submit" name="" value="Aannemen">
    </a>
    <br><br>

</section>
<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>
