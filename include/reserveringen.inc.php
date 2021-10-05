<!DOCTYPE html>
<html lang="en">
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
        <th>ID</th>
        <th>Klant naam</th>
        <th>Film</th>
        <th>Stoel nummer</th>
    </tr>
    <?php 
        $sql = 'SELECT *
        FROM reserveringen';
        $sth = $conn->prepare($sql);
        $sth->execute();

        while ($r = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo $r['reservering_id'] ?></td>
        <td><?php echo $r['klant_id'] ?></td>
        <td><?php echo $r['planning_id'] ?></td>
        <td><?php echo $r['stoel_id'] ?></td>
    </tr>
    <?php } ?>
</table>
<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>