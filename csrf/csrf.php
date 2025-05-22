<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //echo uniqid();
    //echo '<br>';
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(6));
    //echo '<br>';
    ?>

    <a href="csrf_sans_token.php?id=12">Supprimer le 12 (sans token)</a>
    <br>
    <a href="csrf_avec_token.php?id=12&token=<?=$_SESSION["token"] ?>">Supprimer le 12 (avec token)</a>

    <?php
    var_dump($_SESSION);
    ?>
</body>
</html>