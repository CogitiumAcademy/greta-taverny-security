<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    //echo '<h2>Les données reçues en POST</h2>';
    //var_dump($_POST);

    define("DB_HOST", "localhost");
    define("DB_NAME", "greta_security");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_CHARSET", "utf8");

    try {
        $dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $pdo = new PDO($dns, DB_USER, DB_PASSWORD, $options);
    } catch (Exception $e) {
        die("Connexion impossible : " . $e->getMessage());
    }
    //var_dump($pdo);

    try {
        $query = "SELECT B.login, A.type, A.amount FROM accounts A INNER JOIN users B ON A.id_users = B.id WHERE login = :login AND pass = :password";
        echo $query;

        //$req = $pdo->query($query);
        //var_dump($req);

        $curseur = $pdo->prepare($query);
        $curseur->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
        $curseur->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
        $curseur->execute();

        $data = $curseur->fetchAll();
        //var_dump($data);

        echo '<h2>Le résultat</h2>';
        echo '<table border="1">';
        echo '<tr><th>Client</th><th>Type compte</th><th>Montant</th></tr>';
        foreach ($data as $onedata) {
            echo '<tr>';
            echo '<td>' . $onedata[0] . '</td>';
            echo '<td>' . $onedata[1] . '</td>';
            echo '<td>' . $onedata[2] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } catch (Exception $e) {
        die("<br>Erreur sql : " . $e->getMessage());
    }

    
?>

    
</body>
</html>