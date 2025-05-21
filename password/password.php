<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Algos disponibles</h2>
    <?php
    var_dump(password_algos());
    ?>

    <h2>Algorithmes anciens</h2>
    
    <h3>MD5</h3>
    <?php
    $md5 = md5('Philippe77');
    $md5bis = md5('123456DEF');
    var_dump($md5);
    var_dump($md5bis);
    ?>

    <h3>SHA1</h3>
    <?php
    $sha1 = sha1('Philippe77!');
    $sha1bis = sha1('123456');
    var_dump($sha1);
    var_dump($sha1bis);
    ?>

    <h3>Crypt DES</h3>
    <?php
    $crypt = crypt('Philippe', '$2y$');
    $cryptbis = crypt('Philippe', 'abcd');
    var_dump($crypt);
    var_dump($cryptbis);
    ?>

    <h2>Algos modernes</h3>
    <h3>BCRYPT</h3>
    <?php
    $hash_default = password_hash('Philippe', PASSWORD_DEFAULT);
    $hash_default2 = password_hash('Philippe', PASSWORD_DEFAULT);
    var_dump($hash_default);
    var_dump($hash_default2);

    $hash_bcrypt = password_hash('Philippe', PASSWORD_BCRYPT);
    var_dump($hash_bcrypt);
    ?>
    
    <h3>ARGON2I et 2ID</h3>
    
    <?php
    $hash_argon2i = password_hash('Philippe', PASSWORD_ARGON2I);
    var_dump($hash_argon2i);

    $hash_argon2id = password_hash('Philippe', PASSWORD_ARGON2ID);
    var_dump($hash_argon2id);

    ?>
    
    <h3>Informations hash</h3>
    
    <?php
    var_dump(password_get_info($hash_argon2id));
    ?>

    <h3>Vérification de mot de passe</h3>
    
    <?php
    var_dump(password_verify('Philippe', $hash_argon2id));
    ?>

    <h3>Hashage périmé</h3>
    
    <?php
    var_dump(password_needs_rehash($hash_argon2id, PASSWORD_DEFAULT));
    ?>
    <?php
    var_dump(password_get_info($hash_argon2id));
    ?>

</body>
</html>