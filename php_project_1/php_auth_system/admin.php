<?php 
    include "database.php";
    echo $_SESSION['username'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Page</title>
</head>

<body>

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
                <a href="logout.html">Logout</a>
            </li>

            <!-- When the user is not logged in -->
            <?php if() :?>

                <?php endif;?>
        </ul>
    </nav>
    <h2>Admin</h2>
    <h4>Welcome, <?php echo $_SESSION['username'] ?? 'User'; ?></h4>
</body>

</html>