<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Page pirate</h1>

    <?php
    if(!empty($_GET["cookies"])) {
        echo "Les cookies piratés : " . $_GET["cookies"];
    }
    ?>
</body>
</html>