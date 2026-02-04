<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === "Francesco" && $password === "123") {
            session_start();
            session_regenerate_id(true);
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["session_id"] = session_id();
            $_SESSION["login_time"] = date("Y-m-d H:i:s");
            
            header("Location: area_riservata.php");
            exit();
        } else {
            echo "Username o password errati";
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required>
        <br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="Accedi">
    </form>
</body>
</html>
