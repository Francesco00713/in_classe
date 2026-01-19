<?php
    $username = $_COOKIE["username"];
    $theme = $_COOKIE["theme"];
    if($theme === "dark"){
        $background = "#000";
        $text = "#fff";
    } else {
        $background = "#fff";
        $text = "#000";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookie_settati</title>
    <style>
        body{
            background-color: <?php echo $background?>;
            color: <?php echo $text?>;
        }
    </style>
</head>
<body>
    <h1>Benvenuto <?php echo $username?></h1>
</body>
</html>