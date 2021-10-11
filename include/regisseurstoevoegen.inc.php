<form class="maxform" action="php/regisseurtoevoegen.php" method="POST" enctype="multipart/form-data">

    <br><br>
    <link rel="stylesheet" href="../css/style.css">
    <div class="container">
        <div class="text-light">
            <h1>regisseur toevoegen</h1>
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