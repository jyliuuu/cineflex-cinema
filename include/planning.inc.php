<?php
require "private/connectioncineflex.php";
$day[0] = date("Y-m-d", strtotime('now')); // OK
$day[1] = date("Y-m-d", strtotime('+1 day')); // OK
$day[2] = date("Y-m-d", strtotime('+2 day')); // OK
$day[3] = date("Y-m-d", strtotime('+3 day')); // OK
$day[4] = date("Y-m-d", strtotime('+4 day')); // OK
$day[5] = date("Y-m-d", strtotime('+5 day')); // OK
$day[6] = date("Y-m-d", strtotime('+6 day')); // OK

$tomorrownummax = date("Y-m-d", strtotime('+6 day')); // OK


$sql = "SELECT film_id, titel FROM films";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<!-- SCHEDULE -->
<section class="schedule section" id="schedule">
    <div class="container">
        <h1 class="text-white">Planning</h1>
        <?php
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { //manager/mede ?>
            <div class="text-white" data-aos="fade-up" data-aos-delay="200">
                <form action="index.php?page=filmsinplannen" method="POST">
                    <button type="submit" class="btn-lg btn-success" value="Submit">Plan in</button>
                </form>
            </div>
        <?php
            }
        }
        else { ?>

        <?php } ?>
        <table class="table">
          <thead>
            <tr>
                <th class="redtext" scope="col">Films</th>
                <?php foreach ($day as $value) { ?>
                    <th scope="col" class="redtext"><?= $value ?></th>
                <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php while($movie = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                  <th scope="row" class="redtext"><?= $movie['titel'] ?></th>

                    <?php
                    for ($x = 0; $x <= 6; $x++) {
                        $sql2 = "SELECT begin_tijd, planning_id, datum FROM planning WHERE film_id = :film_id AND datum = :datum";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->execute(array(
                            ':film_id' => $movie['film_id'],
                            ':datum' => $day[$x]
                        ));
                        echo "<td>";
                        {
                        while($times = $stmt2->fetch(PDO::FETCH_ASSOC) ){ ?>
                            <form method="post" action="index.php?page=filmbekijken">
                                <input type="hidden" name="filmid" value="<?= $movie['film_id'] ?>">
                                <input type="hidden" name="planningid" value="<?= $times['planning_id'] ?>">
                                <input type="hidden" name="planningtijd" value="<?= $times['begin_tijd'] ?>">
                                <input type="hidden" name="planningdatum" value="<?= $times['datum'] ?>">
                                <button type="submit" class="btn-danger"><?= $times['begin_tijd'] ?></button>
                            </form>
                            <?php
                            echo "<br>";
                        }
                        echo "</td>";
                        }
                    }

                    ?>
                </tr>
            <?php } ?>
          </tbody>
    </table>
</section>
