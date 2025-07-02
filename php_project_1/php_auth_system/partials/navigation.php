<?php
// detect the current page // remove location by using the base name
    $current_page = basename($_SERVER['PHP_SELF']);
    
?>

<nav>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>

        <!-- When the user is logged in -->
        <li>
            <a href="admin.php">Admin</a>
        </li>
        <li>
            <a href="logout.php">Logout</a>
        </li>

        <!-- When the user is not logged in -->
        <?php if(!isset($_SESSION['username'])) :?>
        <!-- #re-->
        <li>
            <a href="register.php">Register</a>
        </li>
        <li>
            <a href="login.php">Login</a>
        </li>
        <!-- When the user is not logged in -->

        <?php endif;?>
    </ul>
</nav>