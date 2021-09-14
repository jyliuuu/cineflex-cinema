<link rel="stylesheet" href="../css/style.css">
<div class="login-box">
    <?php 
    if (isset($_SESSION['newuser'])) {
        echo $_SESSION['newuser'];
        session_unset();
    }
    ?>
    <h2>Login</h2>
    <form action="../php/login.php">
        <div class="user-box">
            <input type="text" name="email" required="">
            <label>Email:</label>
        </div>
        <div class="user-box">
            <input type="password" name="wachtwoord" required="">
            <label>Wachtwoord:</label>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
