<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Requête non protégée</h2>
    <form method="post" action="sqli_vulnerable.php">
        <label for="">Login : </label><input type="text" name="login" required>
        <label for="">Password : </label><input type="text" name="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>