<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

<?php 
echo "<pre>", print_r($_SESSION), "</pre>";
?>
<!-- MENU BAR -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand text-danger"> Cineflex</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-lg-auto">

                <li class="nav-item">
                    <a href="#about" class="nav-link smoothScroll text-danger">Over Ons</a>
                </li>

                <li class="nav-item">
                    <a href="#class" class="nav-link smoothScroll text-danger">Film Spotlight</a>
                </li>

                <li class="nav-item">
                    <a href="#schedule" class="nav-link smoothScroll text-danger">Film Planning </a>
                </li>

                <li class="nav-item">
                    <a href="#contact" class="nav-link smoothScroll text-danger">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="index.php?page=login">Login</a>
                </li>

                <li class="nav-item">
                    <a href="include/registreren.inc.php" class="nav-link smoothScroll text-danger">Registreren</a>
                </li>

                <li class="nav-item">
                    <a href="php/logout.php" class="nav-link smoothScroll text-danger">log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
