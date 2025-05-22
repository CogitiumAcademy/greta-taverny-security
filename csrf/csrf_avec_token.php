<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Page protégée CSRF</h1>
    
    <?php
    var_dump($_SESSION);
    ?>

    <?php
    if (!isset($_GET["token"]) || empty($_GET["token"])) {
        echo "<h2>Token absent ou vide</h2>";
        exit;
    } 
        
    if ($_GET["token"] !== $_SESSION["token"]) {
        echo "<h2>Token invalide</h2>";
        exit;
    }
    
    ?>
    <h2>Suppression du <?= $_GET["id"] ?></h2>

</body>
</html>