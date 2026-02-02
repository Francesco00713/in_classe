<?php
    $conn = new mysqli("db", "users_app", "users_pass", "Users");
    if ($conn->connect_error) {
        die("Errore di connessione");
    }
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM utenti WHERE username = '$username' AND passwordd = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Utente già presente nel database";
        } else {
            echo "Utente NON presente nel database";
        }
    }

    //$scadenza = time()+60*60*24*7;
    //setcookie("username", $_POST["username"], $scadenza);
    //setcookie("theme", $_POST["theme"], $scadenza);
    //header("Location: cookie_settati.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>set_cookie</title>
</head>
<body>
    <form method="POST">
        <h1>INSERISCI LE TUE CREDENZIALI</h1>
        <label for="username">Inserisci il tuo username: </label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Inserisci la tua password:</label>
        <input type="text" name="password" required>
        <br><br>
        <button type="submit">INVIA</button>
    </form>
</body>
</html>