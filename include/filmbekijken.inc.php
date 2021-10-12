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

$sql4 = "SELECT *
         FROM planning
         WHERE film_id = :filmid";
$smt4 = $conn->prepare($sql4);
$smt4->execute(array(
    ':filmid'=> $filmid
));
$r4 = $smt4->fetch(PDO::FETCH_ASSOC);

$sql5 = "SELECT g.genre, g.genre_id
         FROM films_genres fg
         LEFT JOIN genres g 
         ON fg.genre_id = g.genre_id
         WHERE fg.film_id = :filmid";
$smt5 = $conn->prepare($sql5);
$smt5->execute(array(
    ':filmid'=> $filmid
));
$r5 = $smt5->fetch(PDO::FETCH_ASSOC);

$genre = $r5['genre_id'];

$sql6 = "SELECT f.film_id, f.titel, f.poster
         FROM films f
         INNER JOIN films_genres fg
         ON f.film_id = fg.film_id
         WHERE fg.genre_id = :genre 
            AND f.film_id != :filmid
         ORDER BY RAND()
         LIMIT 3";
$smt6 = $conn->prepare($sql6);
$smt6->execute(array(
    ':genre'=> $genre,
    ':filmid'=> $filmid
));

$sql7 = "SELECT a.naam AS acteur
         FROM films f
         INNER JOIN films_acteurs fa
         ON f.film_id = fa.film_id
         INNER JOIN acteurs a
         ON fa.acteur_id = a.acteur_id

         WHERE f.film_id = :filmid";
$smt7 = $conn->prepare($sql7);
$smt7->execute(array(
    ':filmid'=> $filmid
));

$r7 = $smt7->rowCount();

$sql8 = "SELECT a.naam AS acteur
         FROM films f
         INNER JOIN films_acteurs fa
         ON f.film_id = fa.film_id
         INNER JOIN acteurs a
         ON fa.acteur_id = a.acteur_id

         WHERE f.film_id = :filmid";
$smt8 = $conn->prepare($sql8);
$smt8->execute(array(
    ':filmid'=> $filmid
));

$sql9 = "SELECT r.naam AS regisseur
         FROM films f      
         INNER JOIN films_regisseurs fr
         ON f.film_id = fr.film_id
         INNER JOIN regisseurs r
         ON fr.regisseurs_id = r.regisseur_id
         WHERE f.film_id = :filmid";
$smt9 = $conn->prepare($sql9);
$smt9->execute(array(
    ':filmid'=> $filmid
));
$sql10 = "SELECT r.naam AS regisseur
         FROM films f
         
         INNER JOIN films_regisseurs fr
         ON f.film_id = fr.film_id
         INNER JOIN regisseurs r
         ON fr.regisseurs_id = r.regisseur_id

         WHERE f.film_id = :filmid";
$smt10 = $conn->prepare($sql10);
$smt10->execute(array(
    ':filmid'=> $filmid
));

$r10 = $smt10->rowCount();
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
<div class="bg-overlay"></div>
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
                                }  ?>
                                <span class="tag2"><?= $r5['genre'] ?></span>
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
                                    <br>
                                    <?php
                                    if (empty($r4)) { ?>
                                        <span><h2 class="text-danger">( ! )</h2><h2 class="text-white">Deze film wordt helaas niet meer afgespeeld.</h2></span>

                                    <?php
                                    } else { ?>
                                        <form action="php/filmreserveren.php" method="POST">

                                <select name="planning" class="form-control limitform" id="planning">
                                    <?php
                                    while ($r3 = $smt3->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value="<?= $r3['planning_id'] ?>"><?= $r3['begin_tijd'] ?> op <?= $r3['datum'] ?></option><?php
                                    } ?>
                                </select>
                                <button class="btn-transform btn-lg btn-danger" type="submit">Reserveer Ticket</button>
                                        </form>
                                    <?php
                                    }
                                    ?>
                            <br>
                            <hr>
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
                                    <li><a href="#cast">Regisseurs & Acteurs </a></li>
                                    <li><a href="#gerelateerd">Gerelateerde films</a></li>                        
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <section id="about">
                            <h2 class="text-white">Omschrijving</h2>
                            <p class="redtext"><?= $r['omschrijving']; ?></p>
                        </section>

                        <br>
                        <hr>
                        <section id="cast">
                            <h2 class="text-white">Regisseurs & Acteurs </h2>
                            <?php
                            if ($r7 == null AND $r10 == null) { ?>
                                <p class="redtext">n.v.t</p>
                            <?php
                            } else {
                                while ($r8 = $smt8->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <p class="redtext">Acteur - <?= $r8['acteur']; ?></p>
                                    <?php
                                }
                                while ($r9 = $smt9->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <p class="redtext">Regisseur - <?= $r9['regisseur']; ?></p>
                                    <?php
                                }

                            }
                            ?>
                        </section>
                        <hr>

                        <section id="gerelateerd">
                            <h2 class="text-white">Gerelateerde films </h2>
                            <?php
                            while ($r6 = $smt6->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <div class="row">
                                    <div class="column">
                                        <form action="index.php?page=filmbekijken" method="POST">
                                            <input type="hidden" value="<?= $r6['film_id']; ?>" name="filmid">
                                            <img class="singlepic" id="s_img" src="data:image/png;base64,<?= $r6['poster']?>" height=220 width=160/>
                                            <p class="text-white"><?= $r6['titel'] ?></p>
                                            <button class="btn-danger centeringbutton" type="submit">Bekijk</button>
                                        </form>
                                    </div>
                                <?php
                            }
                            ?>
                        </section>
                        <br>
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