<?php
    $servername = "db";
    $username = "myuser";
    $password = "mypassword";
    $database = "myapp_db";

    echo $servername . "<br> /";
    echo $username . "<br> /";
    echo $password . "<br> /";
    echo $database . "<br> /";

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn -> connect_error){
        die("Connessione fallita: " . $conn_error);
    }

    echo "<h1>Connessione riuscita a MySQL:</h1>";

    $result = $conn -> query("SHOW TABLES;");
    echo "<pre>";
    while($row = $result -> fetch_array()){
        print_r($row);
    }
    echo "</pre>";
    //$conn -> close();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $servername = "db";
        $username = "myuser";
        $password = "mypassword";
        $database = "myapp_db";

        $conn = new mysqli($servername, $username, $password, $database);

        if($conn->connect_error){
            die("Connessione fallita: " . $conn->connect_error);
        }

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $q = "INSERT INTO utenti (nome, email) VALUES ('$nome', '$email')";
        
        if($conn -> query($q)){
            echo "Query eseguita con successo!";
            $conn -> close();
        } else{
            echo "ERRORE!";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_id"])) {
        $id = $_POST["delete_id"];
        $q = "DELETE FROM utenti WHERE id = '$id'";
        $conn->query($q);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>in_classe</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <br>
        <input type="submit">

        <?php
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }

            $q ="SELECT * FROM utenti;" ;
                
            $result = $conn->query($q);
            /*
            $row = $result->fetch_array(MYSQLI_ASSOC);
            */
        ?>
    </form>
    <table>
        <?php
            while($row = $results->fetch_array()){
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
            }
            $conn->close();
        ?>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nome
            </td>
            <td>
                Email
            </td>
            <td>
                Azioni
                <form method="POST" action="">
                    <input type="hidden" value="">
                    <input type="submit" value="ELIMINA">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>