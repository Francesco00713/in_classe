<?php
    if($_POST["username"]){

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
        <h1>INSERISCI LE TUE PREFERENZE</h1>
        <label for="username">Inserisci il tuo username: </label>
        <input type="text" name="username" required>
        <br>
        <label for="theme">Inserisci la tua password:</label>
        <input type="text" name="username" required>
        <br><br>
        <button type="submit">INVIA</button>
    </form>
</body>
</html>