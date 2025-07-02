<?php
// detect the current page // remove location by using the base name
    $current_page = basename($_SERVER['PHP_SELF']);
    
?>

<nav>
    <ul>
        <li>
            <a <?php
            
              if($current_page === 'index.php') {
                echo "class='active'";
              }
            
            ?> href="index.php">Home</a>
        </li>

        <!-- When the user is logged in -->
        <li>
            <a <?php
            
              if($current_page === 'admin.php') {
                echo "class='active'";
              }
            
            ?> href="admin.php">Admin</a>
        </li>
        <li>
            <a <?php
            
              if($current_page === 'logout.php') {
                echo "class='active'";
              }
            
            ?> href="logout.php">Logout</a>
        </li>

        <!-- When the user is not logged in -->
        <?php if(!isset($_SESSION['username'])) :?>
        <!-- #re-->
        <li>
            <a <?php
            
              if($current_page === 'register.php') {
                echo "class='active'";
              }
            
            ?> href="register.php">Register</a>
        </li>
        <li>
            <a <?php
            
              if($current_page === 'login.php') {
                echo "class='active'";
              }
            
            ?> href="login.php">Login</a>
        </li>
        <!-- When the user is not logged in -->

        <?php endif;?>
    </ul>
</nav>