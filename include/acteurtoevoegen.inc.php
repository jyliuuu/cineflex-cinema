<div class="freespaces"></div>
<form class="maxform" action="php/acteurtoevoegen.php" method="POST" enctype="multipart/form-data">

<div class="freespaces"></div>
    <link rel="stylesheet" href="../css/style.css">
    <div class="container">
        <div class="text-light">
            <h1>Acteur toevoegen</h1>
            <?php if (isset($_SESSION['error'])) { ?>
            <p><?php echo $_SESSION['error'];
                session_unset();
                }?></p>

            <div class="user-box">
                <label>Naam:</label>
                <input type="text" name="naam" class="form-control" required="">
            </div>

            <input type="submit" name="submit" value="Toevoegen">

</form>
</div>