<form class="maxform" action="php/medewerkeraanemen.php" method="POST" enctype="multipart/form-data">


<br><br>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
    <div class="text-light">
        <h1>Medewerker aanemen</h1>
        <?php if (isset($_SESSION['error'])) { ?> 
    <p><?php echo $_SESSION['error'];
            session_unset(); 
    }?></p>

            <div class="user-box">
                <label>Voornaam</label>
                <input type="text" name="voornaam" class="form-control" required="">
            </div>
        
            <div class="user-box">
                <label>Achternaam</label>
                <input type="text" name="achternaam" class="form-control" required="">
            </div>

            <div class="user-box">
                <label>E-mail</label>
                <input type="text" name="email"  class="form-control" required="">
            </div>

            <div class="user-box">
                <label>Wachtwoord</label>
                <input type="password" name="wachtwoord"  class="form-control" required="">
            </div>

<input type="submit" name="submit" value="Aannemen">

</form>
</div>
