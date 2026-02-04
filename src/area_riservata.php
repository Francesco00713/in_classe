<?php
    session_start();
    if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Area Riservata</title>
</head>
<body>
    <h1>AREA RISERVATA</h1>
    <p><strong>Username:</strong> <?php echo $_SESSION["username"]; ?></p>
    <p><strong>ID di sessione:</strong> <?php echo $_SESSION["session_id"]; ?></p>
    <p><strong>Login effettuato alle:</strong> <?php echo $_SESSION["login_time"]; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>