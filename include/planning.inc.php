<!-- SCHEDULE -->
<section class="schedule section" id="schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h6 data-aos="fade-up">Planning</h6>

                <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">Kijk Wat Er Speelt.</h2>
            </div>
            <div class="col-lg-12 py-5 col-md-12 col-12 ">
                <div class="planning">
                    <table class="mx-auto table table-bordered table-responsive schedule-table" data-aos="fade-up"
                        data-aos-delay="300">
                </div>
                <thead class="thead-light">
                    <th></i></th>
<?php 
require "private/connectioncineflex.php";
$today = date("m-d", strtotime('now')); // OK
$tomorrow = date("m-d", strtotime('+1 day')); // OK
$tomorrow2 = date("l m-d", strtotime('+2 day')); // OK
$tomorrow3 = date("l m-d", strtotime('+3 day')); // OK
$tomorrow4 = date("l m-d", strtotime('+4 day')); // OK
$tomorrow5 = date("l m-d", strtotime('+5 day')); // OK
$tomorrow6 = date("l m-d", strtotime('+6 day')); // OK

$tomorrownummax = date("Y-m-d", strtotime('+6 day')); // OK

$sql = 'SELECT *
        FROM films';
$sth = $conn->prepare($sql);
$sth->execute();

$sql2 = "SELECT *
    	 FROM planning
         WHERE datum >= :datum";
$sth2 = $conn->prepare($sql2);
$sth2->execute(array(
    ':datum'=> $tomorrownummax
));

$r2 = $sth2->fetchAll(PDO::FETCH_ASSOC);
?>
                <tabel style="table-layout: fixed">
                    <th>Today <br> <?= $today ?></th>
                    <th>Tomorrow <br> <?= $tomorrow ?></th>
                    <th><?= $tomorrow2 ?></th>
                    <th><?= $tomorrow3 ?></th>
                    <th><?= $tomorrow4 ?></th>
                    <th><?= $tomorrow5 ?></th>
                    <th><?= $tomorrow6 ?></th>
                </thead>
<?php while ($r = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
                <tbody>
                    <tr>
                        <!-- 1 td is een film blok in de planning -->
                        <td><small><?= $r['titel']?></small></td>
                        <?php for ($i = 1; $i <= 7; $i++ ) { ?>
                        <td>
                            <?php
                            if (empty($r2)) 
                            { 
                                for ($i = 1; $i <= 7; $i++ ) { ?>
                                    <td>
                                        <br>
                                    </td>
                                <?php } 
                            }
                            else 
                            {
                                
                            } ?>
                        </td>
                        <?php } ?>
                </tbody>
<?php } ?>
                </table>
            </div>

        </div>
    </div>
</table>
<div class="text-white" data-aos="fade-up" data-aos-delay="200">
    <form action="index.php?page=filmsinplannen" method="POST">
        <button type="submit" class="btn-lg btn-success" value="Submit">Plan in</button>
    </form>
</div>    
</section>