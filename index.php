<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>in_classe</title>
</head>
<body>
    <?php
        $path = "users.csv";
        $file = fopen($path, "r");
        echo "<table>";
        while (($riga = fgetcsv($file)) !== false) {
            echo "<tr>";
            foreach ($riga as $campo) {
                echo "<td>" . htmlspecialchars($campo) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        fclose($file);
    ?>
</body>
</html>