<?php
//
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>

<body>
    <h2>About</h2>
    <p>Welcome back, <?php echo $_SESSION['username'] ?? 'Guest'; ?></p>
</body>

</html>