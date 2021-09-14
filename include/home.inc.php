<!DOCTYPE html>
<html lang="en">
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
     <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

            <div class="bg-overlay"></div>

               <div class="container">
                    <div class="row">

                         <div class="col-lg-8 col-md-10 mx-auto col-12">
                              <div class="hero-text mt-5 text-center">
                                    <?php
                                     if (isset($_SESSION['newuser'])) {
                                        ?> <h6 data-aos="fade-up" data-aos-delay="300"> <?php $_SESSION['newuser'];
                                        session_unset();
                                        }
                                        ?>
                                    <h6 data-aos="fade-up" data-aos-delay="300">Beste plek waar je kan genieten</h6>

                                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Onbeperkt series, films en meer kijken. </h1>

                                    <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Get started</a>

                                    <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">learn more</a>
                                   
                              </div>
                         </div>

                    </div>
               </div>
     </section>


     <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">Ben je nieuw bij Cineflex?</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">Dit maakt opzicht niet heel veel uit.</h6>

                    <p data-aos="fade-up" data-aos-delay="200"> Je hoeft geen account te maken als je wilt zien welke films deze week worden gedraaid.<br><br>Indien je tickets wilt reserveren moet je wel een account aanmaken.   </p>

                    <a href="include/registreren.inc.php" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300">klik hier als je account wilt maken</a>
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                     <div class="about-working-hours">
                          <div>

                                <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Openingstijden</h2>

                               <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">maandag tot en met vrijdag</strong>

                                <p data-aos="fade-up" data-aos-delay="800">13:00 - 02:00</p>

                                <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700"> weekend</strong>

                                <p data-aos="fade-up" data-aos-delay="800">13:00 - 02:00</p>
                               </div>
                          </div>
                     </div>
                </div>

            </div>
        </div>
    </section>


     <!-- ABOUT -->
     <section class="about section" id="about">
               <div class="container">
                    <div class="row">

                            <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-12 col-md-12 mx-auto col-12">
                                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hallo, wij zijn Cineflex team</h2>

                                <p data-aos="fade-up" data-aos-delay="400">Cineflex heeft een uitgebreide catalogus van speelfilms, documentaires, series, anime, bekroonde Netflix Originals en meer. Kijk zoveel je wilt en wanneer je wilt.</p>

                                <p data-aos="fade-up" data-aos-delay="500">Je kijkt zo veel je wilt, wanneer je wilt, zonder enige vorm van reclame. En dit allemaal voor één lage prijs per maand. Er valt altijd iets nieuws te ontdekken en elke week worden er nieuwe series en films toegevoegd!</p>

                            </div>
                            <div class="empty">
                                <br>
                            </div>
                            <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                                <div class="team-thumb">
                                    <img src="images/team/team-image.jpg" class="img-fluid" alt="Trainer" style="max-height: 270px">

                                    <div class="team-info d-flex flex-column">

                                        <h3>Huzaifa Balaksi</h3>
                                        <span>Software Developer</span>

                                        <ul class="social-icon mt-3">
                                            <li><a href="https://www.instagram.com" class="fa fa-twitter"></a></li>
                                            <li><a href="https://www.instagram.com" class="fa fa-instagram"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                                <div class="team-thumb">
                                    <img src="images/team/jacky.jpg" class="img-fluid" alt="Trainer" style="max-height: 270px">

                                    <div class="team-info d-flex flex-column">

                                        <h3>Jacky Liu</h3>
                                        <span>Software Developer</span>

                                        <ul class="social-icon mt-3">
                                            <li><a href="#" class="fa fa-instagram"></a></li>
                                            <li><a href="#" class="fa fa-facebook"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                                <div class="team-thumb">
                                    <img src="images/team/dion.jpg" class="img-fluid" alt="Trainer" style="max-height: 270px">

                                    <div class="team-info d-flex flex-column">

                                        <h3>Dion Muller</h3>
                                        <span>Software Developer</span>

                                        <ul class="social-icon mt-3">
                                            <li><a href="#" class="fa fa-instagram"></a></li>
                                            <li><a href="#" class="fa fa-facebook"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
               </div>
     </section>


     <!-- CLASS -->
     <section class="class section" id="class">
               <div class="container">
                    <div class="row">

                            <div class="col-lg-12 col-12 text-center mb-5">
                                <h6 data-aos="fade-up">Film Spotlight</h6>

                                <h2 data-aos="fade-up" class="text-white" data-aos-delay="200">beste trending films</h2>
                             </div>

                            <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                                <div class="class-thumb">
                                    <img src="images/class/you.jpg" class="img-fluid" alt="Class" style="min-height:450px">

                                    <div class="class-info">
                                        <h3 class="mb-1">You</h3>

                                        <span><strong>Directeur:</strong> Greg Berlanti; Sera Gamble</span>



                                        <p class="mt-3">Een gevaarlijk charmante, geobsedeerde jongeman neemt extreme maatregelen om een plaats te krijgen in het leven van degenen op wie hij zijn oog heeft laten vallen.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                                <div class="class-thumb">
                                    <img src="images/class/fury.jpg" class="img-fluid" alt="Class" style="min-height:450px">

                                    <div class="class-info">
                                        <h3 class="mb-1">Fury</h3>

                                        <span><strong>Directeur:</strong> Nicholas Joseph</span>



                                        <p class="mt-3">'Fury' volgt de door de wol geverfde Wardaddy aan het einde van de Tweede Wereldoorlog. Hij heeft de leiding over een vijfkoppige tank-crew die een levensgevaarlijke missie in vijandelijk gebied dient uit te voeren.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                                <div class="class-thumb">
                                    <img src="images/class/bird.jpg" class="img-fluid" alt="Class" style="min-height:450px">

                                    <div class="class-info">
                                        <h3 class="mb-1">Bird Box</h3>

                                        <span><strong>Directeur:</strong> Susanne Bier</span>


                                        <p class="mt-3">Bird Box is een Amerikaanse post-apocalyptische thriller uit 2018, geregisseerd door Susanne Bier en gebaseerd op de gelijknamige roman uit 2014 van Josh Malerman</p>
                                    </div>
                                </div>
                            </div>

                    </div>
               </div>
     </section>
<?php
    include 'include/planning.inc.php';
?>
     <!-- CONTACT -->
     <section class="contact section" id="contact">
          <div class="container">
               <div class="row">

                    <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="600">Waar kan je ons vinden</h2>

                        <p data-aos="fade-up" class="text-white" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i> Zijpendaalseweg 167 - Arnhem, Nederland</p>
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
                        <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2456.594074715265!2d5.888991415486854!3d51.9960518797184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7a5a22b8b81cb%3A0xa9d063799555c1f!2sRijn%20IJssel!5e0!3m2!1snl!2snl!4v1631527682797!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- FOOTER -->
     <footer class="site-footer">
          <div class="container">
               <div class="row">

                    <div class="ml-auto col-lg-7 col-md-7">
                        <p class="text-white copyright-text">Copyright &copy; 2021 Cineflex.
                        <br><br>     
                        Front-end: <a href="https://www.rijnijssel.nl" class="text-white">made by Huzaifa Balaksi, Jacky Liu, Dion Muller</a>
                        <br> Back-end: <a href="https://www.rijnijssel.nl" class="text-white">made by Huzaifa Balaksi, Jacky Liu, Dion Muller</a></p>
                    </div>

                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-8">
                        <p class="mr-2">
                            <i class="fa fa-envelope-o mr-1"></i>
                            <a class="text-white" href="#">E: cineflexsupport@gmail.com</a>
                        </p>           
                        <p class="text-white">T: 0681822526</p>
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>