<?php
include "private/connectioncineflex.php";

$sql = "SELECT * 
FROM regisseurs";
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
                    <h6 data-aos="fade-up" data-aos-delay="300">Acteurs overzicht</h6>

                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500"><De></De> geweldige regisseurs van onze exclusive CineFlex films
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
                <th>Naam:</th>
            </tr>

            <?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <br>
                    <td class="text-light" data-aos="fade-up" data-aos-delay="100"> <?php echo $r['naam'] ?></td>

                    <td>
                        <?php echo '<a href="index.php?page=regisseursbewerken&regisseur_id='.$r['regisseur_id'].'" class="btn btn-primary">Bewerk</a>'; ?>">
                    </td>
                    <td>
                        <form action="php/regisseurverwijderen.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $r['regisseur_id'] ?>">
                            <button class="btn btn-danger">Verwijder</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <a href = "index.php?page=regisseurstoevoegen">
                <input class="btn btn-success" type="submit" name="" value="Regisseur toevoegen">
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