<?php
    include_once("db_common.php");

    $conn = new mysqli($servername, $username, $password, $database);
    if($conn -> connect_error){
        die("Connessione fallita: " . $conn_error);
    }

    echo "<h1>Connessione riuscita a MySQL</h1>";
    echo "<h2>- - - UTENTI - - -</h2>";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])){
        //- - - CANCELLAZIONE - - -//
        $id = $_POST["delete_id"];
        $q = "DELETE FROM utenti WHERE id = '$id'";
        $conn -> query($q);
    } else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
        //- - - MODIFICA - - - //
        $edit_id = $_POST["edit_id"];
        $edit_nome = $_POST["edit_nome"];
        $edit_email = $_POST["edit_email"];
        $q = "UPDATE utenti SET nome='$edit_nome', email='$edit_email' WHERE id='$edit_id'";
        $conn -> query($q);
    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        //- - - STAMPA TABELLA - - -//
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabella_utenti</title>
    <style>
        .hidden{
            display: none;
        }
        .button{
            padding-top: 17.5px;
        }
    </style>
    <script>
        function showEdit(id) {
            const row = document.getElementById("edit-" + id);
            row.classList.toggle("hidden");
        }
    </script>
</head>

<body>
    <?php
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn -> connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
        $q ="SELECT * FROM utenti;" ;
        $result = $conn -> query($q);
    ?>
    <table>
        <?php
            while($row = $result -> fetch_array()){
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
                <button type="button" onclick="showEdit(<?php echo $row['id']; ?>)">Modifica</button>
            </td>
            <td class="button">
                <form method="post" action=".">
                <input type="hidden" name="delete_id" value="<?php echo $row["id"]?>"/>
                <input type="submit" value="Cancella"/>
                </form>
            </td>
        </tr>
        <tr class="hidden" id="edit-<?php echo $row['id']; ?>">
            <form method="post" action=".">
            <td>
                <?php echo $row["id"]; ?>
            </td>
            <td>
                <input type="text" name="edit_nome" value="<?php echo $row['nome']; ?>">
            </td>
            <td>
                <input type="text" name="edit_email" value="<?php echo $row['email']; ?>">
            </td>
            <td>
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <input type="submit" name="edit" value="SALVA">
            </td>
            </form>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>

let button = document.querySelectorAll("")