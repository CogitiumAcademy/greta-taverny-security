<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        document.cookie = 'login=my_login';
        document.cookie = 'motdepasse=my_secret_password';
    </script>
    <title>Document</title>
</head>
<body>

    <?php if (isset($_POST["keyword2"]) && !empty($_POST["keyword2"])) { ?>
        <h2>Site sécurisé</h2>
        <?php $_POST["keyword2"] = htmlspecialchars($_POST["keyword2"], ENT_QUOTES); ?>
        <?= "Résultat(s) pour le mot clé :" . $_POST["keyword2"]; ?>
    <?php } ?>

    <?php 
    if (isset($_POST["username"]) && !empty($_POST["username"])) { 
        $_SESSION["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES);
    }
    ?>
    <h2>Contenu de la session</h2>
    <?php var_dump($_SESSION); ?>

    <h2>Sécurisé</h2>
    <form method="post" action="">
        <label for="rech2">Recherche</label>
        <input id="rech2" type="text" name="keyword2" size="80">
        <input type="submit" value="Rechercher">
    </form>

    <h2>Formulaire session</h2>
    <form method="post" action="">
        <label for="username">Username : </label>
        <input id="username" type="text" name="username" size="25">
        <input type="submit" value="Enregistrer">
    </form>

</body>
</html>