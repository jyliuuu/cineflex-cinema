<?php 
include 'private/connectioncineflex.php';

$filmid = $_POST['filmid'];

$sql = "SELECT * 
        FROM films
        WHERE film_id = :filmid";
$smt = $conn->prepare($sql);
$smt->execute(array(
    ':filmid'=> $filmid
));
$r = $smt->fetch(PDO::FETCH_ASSOC);

$sql2 = "SELECT fk.film_id , kw.naam 
         FROM films_kijkwijzers fk
         LEFT JOIN kijkwijzers kw 
         ON fk.kijkwijzer_id = kw.kijkwijzer_id 
         WHERE fk.film_id = :filmid";
$smt2 = $conn->prepare($sql2);
$smt2->execute(array(
    ':filmid'=> $filmid
));

$sql3 = "SELECT *
         FROM planning
         WHERE film_id = :filmid";
$smt3 = $conn->prepare($sql3);
$smt3->execute(array(
    ':filmid'=> $filmid
));
?>

<!-- moviesingle07:38-->
<head>

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<div class="freespacexm"></div>

<!-- HERO -->
    <div>
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img sticky-sb">
                        <img class="singlepic" id="s_img" src="data:image/png;base64,<?= $r['poster']?>" height=900 width=300/> 

                        <div class="movie-rate">
                            <div class="rate">
                                <i class="ion-android-star"></i>
                                <?php 
                                while ($r2 = $smt2->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                    <span class="tag"><?= $r2['naam'] ?></span>
                                <?php 
                                }  
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content">
                        <h1 class="bd-hd text-white"><?= $r['titel']?></h1>
                        <div class="movie-btn floatright">	
                            <div class="freespacexs"></div>
                            <?php // film reserveren form ?>
                            <form action="php/filmreserveren.php" method="POST">

                                <select name="planning" class="form-control limitform" id="planning">
                                    <?php 
                                    while ($r3 = $smt3->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value="<?= $r3['planning_id'] ?>"><?= $r3['begin_tijd'] ?> op <?= $r3['datum'] ?></option><?php
                                    } ?>
                                </select>
                                <button class="btn-transform btn-lg btn-danger" type="submit">Reserveer Ticket</button>
                            </form>

                        </div>
                        
                        <div class="social-btn">
                            <a href="#" class="parent-btn"><i class="ion-heart"></i>> Voeg toe aan favorieten</a>	
                        </div>
                        <br>
                        <div class="movie-tabs">
                            <h2 class="text-white">Contents </h2>
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#omschrijving">Omschrijving</a></li>
                                    <li><a href="#cast">Cast & Acteurs </a></li>
                                    <li><a href="#gerelateerd">Gerelateerde films</a></li>                        
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <h2 class="text-white">Omschrijving</h2>
                        <p class="redtext"><?= $r['omschrijving']; ?></p>
                        <br>
                        <hr>
                        <h2 class="text-white">Cast & Acteurs </h2>
                            <?php // while loop for acteurs ?>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- moviesingle11:03-->
</html>