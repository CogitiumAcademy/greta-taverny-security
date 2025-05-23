<?php
session_start();
$i = 0;
$caracteres = "abcdefghijklmnopqrstuvwxyz0123456789!%$@#";
$password = "";
$_SESSION["tours"] = 0;

while(password_hash($password, PASSWORD_DEFAULT) != password_hash("ab", PASSWORD_DEFAULT)) {
    $_SESSION["tours"] = $i;
    $car1 = substr($caracteres, rand(0, 40), 1);
    $car2 = substr($caracteres, rand(0, 40), 1);
    //$car3 = substr($caracteres, rand(0, 40), 1);
    //$car4 = substr($caracteres, rand(0, 40), 1);
    //$car5 = substr($caracteres, rand(0, 35), 1);
    $password = $car1 . $car2;
    $i++;
}

echo $password . " : " . $i . " tentatives";