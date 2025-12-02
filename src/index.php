<?php
    include_once("db_common.php");

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
    <?php
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
        $q ="SELECT * FROM utenti;" ;
        $result = $conn->query($q);
    ?>
    <table>
        <?php
            while($row = $result->fetch_array()){
        ?>
        <tr>
            <td>
                <?php echo $row["id"] ?>
            </td>
            <td>
                <?php echo $row["nome"] ?>
            </td>
            <td>
                <?php echo $row["email"] ?>
            </td>
            <td>
                <form method="post" action=".">
                <input type="hidden" name="user_id" value="<?php echo $row["id"]?>"/>
                <input type="submit" value="cancella"/>
                </form>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>

let button = document.querySelectorAll("")