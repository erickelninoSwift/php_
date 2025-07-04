<?php
   include "partials/header.php";
?>
<?php include "partials/navigation.php" ?>
<div class="container">
    <div class="hero" style="background-image: url('images/sea-night-ocean-dark.jpg');">
        <div class="hero-content">
            <h1>Welcome to our PHP App</h1>
            <p>Securely login and manage your account with us</p>
            <?php if(!isset($_SESSION['username']) && empty($_SESSION['username'])): ?>
            <div class="hero-buttons">
                <a class="btn" href="login.php">Login</a>
                <a class="btn" href="register.php">Register</a>
            </div>
            <?php else:?>
            <div class="hero-buttons">
                <a class="btn" href="admin.php">Admin</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
  include "partials/footer.php";
?>