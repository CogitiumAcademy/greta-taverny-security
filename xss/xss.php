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

    <?php /*
    Coucou

    <h1>Coucou</h1>
    
    <script>alert("Coucou");</script>

    <script>alert("Cookies = " + document.cookie);</script>

    <script>window.location.replace("http://localhost/formation/greta-taverny/greta-taverny-security/xss/xss_pirate.php")</script>

    <script>window.location.replace("http://localhost/formation/greta-taverny/greta-taverny-security/xss/xss_pirate.php?cookies=" + document.cookie);</script>

    <img src="aaaa" onerror="alert('Coucou')">
    */ ?>
    <?php if (isset($_POST["keyword"]) && !empty($_POST["keyword"])) { ?>
        <h2>Site non sécurisé</h2>
        <?= "Résultat(s) pour le mot clé :" . $_POST["keyword"]; ?>
    <?php } ?>

    <?php if (isset($_POST["keyword2"]) && !empty($_POST["keyword2"])) { ?>
        <h2>Site sécurisé</h2>
        <?php $_POST["keyword2"] = htmlspecialchars($_POST["keyword2"], ENT_QUOTES); ?>
        <?= "Résultat(s) pour le mot clé :" . $_POST["keyword2"]; ?>
    <?php } ?>

    <?php 
    if (isset($_POST["username"]) && !empty($_POST["username"])) { 
        $_SESSION["username"] = $_POST["username"];
    }
    ?>
    <h2>Contenu de la session</h2>
    <?php var_dump($_SESSION); ?>

    <h2>Non sécurisé</h2>
    <form method="post" action="">
        <label for="rech">Recherche</label>
        <input id="rech" type="text" name="keyword" size="80">
        <input type="submit" value="Rechercher">
    </form>

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

    <h2>Protection en PHP : htmlentities ou htmlspecialchars</h1>
    <p>
        htmlentities encode tous les caractères spéciaux (< > "…) mais aussi les é è à ù… alors que htmlspecialchars se contente des caractères spéciaux ce qui suppose donc que vous utilisez un charset supportant les caractères comme é è à ù sinon vous aurez probablement des � à la place.
    </p>
    <p>
        Le paramètre ENT_QUOTES est ajouté à la fonction htmlentities ou htmlspecialchars pour préciser d'échapper également les simples guillemets car cela peut être problématique, notamment si, par exemple, vous utilisez la chaîne vulnérable dans un attribut d'une balise HTML qui est sous la forme attribut='valeur' : le simple guillemet n'étant pas échappé, il est donc encore possible de fermer cet attribut. Le ENT_QUOTES empêchera cela.
    </p>

</body>
</html>