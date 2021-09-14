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
                                    <table class="mx-auto table table-bordered table-responsive schedule-table" data-aos="fade-up" data-aos-delay="300">
                                </div> 
                                    <thead class="thead-light">
                                        <th>Titel</i></th>
<?php 
$today = date("m-d", strtotime('now')); // OK
$tomorrow = date("m-d", strtotime('+1 day')); // OK
$tomorrow2 = date("l m-d", strtotime('+2 day')); // OK
$tomorrow3 = date("l m-d", strtotime('+3 day')); // OK
$tomorrow4 = date("l m-d", strtotime('+4 day')); // OK
$tomorrow5 = date("l m-d", strtotime('+5 day')); // OK
$tomorrow6 = date("l m-d", strtotime('-1 day')); // OK
?>
                                        <th>Today <?= $today ?></th>
                                        <th>Tomorrow <?= $tomorrow ?></th>
                                        <th><?= $tomorrow2 ?></th>
                                        <th><?= $tomorrow3 ?></th>
                                        <th><?= $tomorrow4 ?></th>
                                        <th><?= $tomorrow5 ?></th>
                                        <th><?= $tomorrow6 ?></th>
                                    </thead>
                                        <tbody>
                                            <tr>
                                            <!-- 1 td is een film blok in de planning -->
                                            <td><small>FILM 1</small></td>
                                            <td>
                                                <strong>ZAAL NUMMER</strong>
                                                <span>BEGIN_TIJD + EIND_TIJD</span>
                                            </td>
                                            <td>
                                                <strong>ZAAL NUMMER</strong>
                                                <span>BEGIN_TIJD + EIND_TIJD</span>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                         </tr>
                                         <tr> 
                                             <!-- elk td is een nieuwe film. -->
                                            <td><small>FILM 2</small></td>
                                            <td>
                                                <strong>ZAAL NUMMER</strong>
                                                <span>BEGIN_TIJD + EIND_TIJD</span>
                                            </td>
                                            <td>
                                                <strong>ZAAL NUMMER</strong>
                                                <span>BEGIN_TIJD + EIND_TIJD</span>
                                            </td>
                                            <td> 
                                                <!-- geen film in planning    -->
                                            </td>
                                            <td>
                                                <strong>ZAAL NUMMER</strong>
                                                <span>BEGIN_TIJD + EIND_TIJD</span>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                         </tr>
                                         <tr>
                                            <td><small>FILM 3</small></td>
                                            <?php 
                                            for ($i = 0; $i <= 6; $i++ ) { ?>
                                                <td>
                                                <strong>ZAAL NUMMER</strong>
                                                <span>BEGIN_TIJD + EIND_TIJD</span>
                                                </td>            
                                            <?php } ?> 
                                         </tr>
                                         <tr>
                                            <td><small>FILM 4</small></td>
                                            <?php 
                                            for ($i = 0; $i <= 6; $i++ ) { ?>
                                                <td>
                                                    <br>
                                                </td>          
                                            <?php } ?> 
                                         </tr>
                                         <tr>
                                            <td><small>FILM 5</small></td>
                                            <?php 
                                            for ($i = 0; $i <= 6; $i++ ) { ?>
                                                <td>
                                                    <br>
                                                </td>          
                                            <?php } ?> 
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>

                    </div>
               </div>
     </section>
</table>