<?php 
    include "database.php";
    echo $_SESSION['username'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <h2>Admin</h2>
    <h4>Welcome, <?php echo $_SESSION['username'] ?? 'User'; ?></h4>
</body>

</html>