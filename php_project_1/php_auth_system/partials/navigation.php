<?php
// detect the current page // remove location by using the base name
    $current_page = basename($_SERVER['PHP_SELF']);
    $class_active = "";
    
?>

<nav>
    <ul>
        <li>
            <a class="<?php echo setPageToActive("index.php")?>" href="index.php">Home</a>
        </li>

        <!-- When the user is logged in -->
        <li>
            <a class="<?php echo setPageToActive("admin.php")?>" href="admin.php">Admin</a>
        </li>
        <li>
            <a class="<?php echo setPageToActive("logout.php")?>" href="logout.php">Logout</a>
        </li>

        <!-- When the user is not logged in -->
        <?php if(!isset($_SESSION['username'])) :?>
        <!-- #re-->
        <li>
            <a class="<?php echo setPageToActive("register.php")?>" href="register.php">Register</a>
        </li>
        <li>
            <a class="<?php echo setPageToActive("login.php")?>" href="login.php">Login</a>
        </li>
        <!-- When the user is not logged in -->

        <?php endif;?>
    </ul>
</nav>