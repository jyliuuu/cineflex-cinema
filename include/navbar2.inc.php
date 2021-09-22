<body data-spy="scroll" data-target="#navbarNav" data-offset="50">
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
                <?php         
                if ($_SESSION['rol'] == 3) { // klant rol ?>
                    <li class="nav-item">
                        <a href="index.php?page=filmsoverzicht" class="nav-link smoothScroll text-danger">Film Spotlight</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?page=filmsplanning" class="nav-link smoothScroll text-danger">Film Planning </a>
                    </li>

                    <li class="nav-item">
                        <a href="php/logout.php" class="nav-link smoothScroll text-danger">log out</a>
                    </li>
                <?php
                } else if ($_SESSION['rol'] == 2) { // medewerkers ?>
                    <li class="nav-item">
                        <a href="index.php?page=groet" class="nav-link smoothScroll text-danger">welkom</a>
                    </li>

                    <li class="nav-item">
                    <a href="index.php?page=filmsoverzicht" class="nav-link smoothScroll text-danger">Films</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?page=filmsplanning" class="nav-link smoothScroll text-danger">Planning</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?page=reserveringen" class="nav-link smoothScroll text-danger">Reserveringen</a>
                    </li>

                    <li class="nav-item">
                        <a href="php/logout.php" class="nav-link smoothScroll text-danger">log out</a>
                    </li>
                <?php
                } else if ($_SESSION['rol'] == 1) { // manager ceo ?>
                    <li class="nav-item">
                        <a href="index.php?page=groet" class="nav-link smoothScroll text-danger">welkom</a>
                    </li>

                    <li class="nav-item">
                    <a href="index.php?page=filmsoverzicht" class="nav-link smoothScroll text-danger">Films</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?page=filmsplanning" class="nav-link smoothScroll text-danger">Planning</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?page=reserveringen" class="nav-link smoothScroll text-danger">Reserveringen</a>
                    </li>

                    <li class="nav-item">
                        <!-- WIP -->
                        <a href="index.php?page=medewerkers" class="nav-link smoothScroll text-danger">Medewerkers</a> 
                    </li>

                    <li class="nav-item">
                        <a href="php/logout.php" class="nav-link smoothScroll text-danger">log out</a>
                    </li>
                <?php
                } else {
                    echo "Er is een error ontstaan, probeer later eens opnieuw.";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
