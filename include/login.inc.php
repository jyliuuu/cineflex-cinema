<link rel="stylesheet" href="../css/style.css">
<div class="login-box">
    <h2>Login</h2>
    <?php
        if (isset($_SESSION['melding'])) {
            echo '<div class="txtboxLalign alert alert-danger" role="alert">
            Het wachtwoord of het email is incorrect.
            </div>';
            unset($_SESSION['melding']);
        } else {
        }
        $_SESSION['page'] = $page;
    ?>
    <form action="php/login.php" class="maxform" method="post">
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
