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
        <th>Klant naam</th>
        <th>Leeftijd</th>
        <th>Film</th>
        <th>Actions</th>
    </tr>
    <?php 
        $sql = 'SELECT *
        FROM films';
        $sth = $conn->prepare($sql);
        $sth->execute();

        $sql2 = 'SELECT *
        FROM films';
        $sth2 = $conn->prepare($sql2);
        $sth2->execute();

        while ($r = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td>
            <img id="l_img" src="data:image/png;base64,<?php echo $r['poster'] ?>" alt="team photo" />
        </td>
        <td><?php echo $r['titel'] ?></td>
        <td><?php echo $r['leeftijd'] ?></td>
        <td><?php echo $r['duratie'] ?></td>
        <td>
            <form action="index.php?page=editteam" method="POST">
                <input type="hidden" name="film_id" value="<?php echo $r['film_id'] ?>">
                <button type="submit" class="btn btn-warning" value="Submit">EDIT</button>
            </form>
        </td>
        <td>
            <form action="PHP/deleteteam.php" method="POST">
                <input type="hidden" name="film_id" value="<?php echo $r['film_id'] ?>">
                <input type="hidden" name="tname" value="<?php echo $r['name'] ?>">
                <button type="submit" class="btn btn-danger" value="Submit">DELETE</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<br>
<hr>
<br>
<?php if ($sth->rowcount() == 0) { ?>
    <div class="textcenter">
        <br>
        <h6 class="text-light">Er zijn momenteel geen reserveringen gezet.</h6>
    </div>
<?php } else { ?>
    <br>
    <table class="txtalign" style="width:100%">
        <tr>
            <th>Photo</th>
            <th>Team name</th>
            <th>Coach</th>
            <th>City</th>
            <th>Actions</th>
        </tr>
        <?php while ($r2 = $smt2->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td>
                    <img id="l_img" src="data:image/png;base64,<?php echo $r2['poster'] ?>" alt="team photo" />
                </td>
                <td><?php echo $r2['titel'] ?></td>
                <td><?php echo $r2['leeftijd'] ?></td>
                <td><?php echo $r2['duratie'] ?></td>
                <td>
                    <form action="index.php?page=editteam" method="POST">
                        <input type="hidden" name="film_id" value="<?php echo $r2['film_id'] ?>">
                        <button type="submit" class="btn btn-warning" value="Submit">EDIT</button>
                    </form>
                </td>
                <td>
                    <form action="PHP/deleteteam.php" method="POST">
                        <input type="hidden" name="film_id" value="<?php echo $r2['film_id'] ?>">
                        <input type="hidden" name="tname" value="<?php echo $r2['titel'] ?>">
                        <button type="submit" class="btn btn-danger" value="Submit">DELETE</button>
                    </form>
                </td>
            </tr>
    <?php }
    } ?>
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