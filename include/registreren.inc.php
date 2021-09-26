<link rel="stylesheet" href="../css/style.css">
<div class="login-box maxform">
    <h2>Registratie</h2>
    <?php if (isset($_SESSION['wachtwoord_error'])) { ?> 
    <p><?php echo $_SESSION['wachtwoord_error'];
            session_unset(); 
    }?></p>
    
    <form class="maxform" action="php/registreren.php" method="POST">
        <div class="user-box">
            <input type="text" name="voornaam" required="">
            <label>Voornaam</label>
        </div>
        <div class="user-box">
            <input type="text" name="achternaam" required="">
            <label>Achternaam</label>
        </div>
        <div class="user-box">
            <input type="email" name="email" required="">
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="wachtwoord" name="wachtwoord" required="">
            <label>Password</label>
        </div>
        <div class="user-box">
            <input type="number" name="leeftijd" max="99" required="">
            <label>Leeftijd</label>
        </div>
        <div class="user-box">
            <input type="text" name="postcode" maxLength="6" minLength="6" required="">
            <label>Postcode</label>
        </div>
        <div class="user-box">
            <input type="text" name="woonplaats" required="">
            <label>Woonplaats</label>
        </div>
        <div class="user-box">
            <input type="text" name="straat" required="">
            <label>Straat</label>
        </div>
        <div class="user-box">
            <input type="text" name="provincie" required="">
            <label>Provincie</label>
        </div>
        <div class="user-box">
            <input type="text" name="telefoon" required="">
            <label>Telefoon</label>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>


