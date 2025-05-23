<?php
session_start();

function getClientIp() {
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]; // Premier IP = IP réelle
    }
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    return $_SERVER['REMOTE_ADDR'];
}

if (isset($_GET["login"])) {

    if (($_GET["login"] == "user") && ($_GET["password"] == "pass")) {
        echo "<h3>Utilisateur authentifié !</h3>";
    } else {
        echo "<h3>Utilisateur refusé !</h3>";
        //echo "<pre>"; var_dump($_SERVER); echo "</pre>";
        //echo "<h3>IP = " . getClientIp() . "</h3";

        $ip = getClientIp();
        
        $_SESSION["ip"][] = array(
            'ip' => $ip,
            'date' => time()
        );

        $newTime = time();
        if (isset($_SESSION["time"]) ) {
            $previousTime = $_SESSION["time"];
            if (($newTime - $previousTime) < 5) {
                die("<h3>Blocage attaque force brute, trop rapide !</h3>");
            }
        }

        $_SESSION["time"] = $newTime;

        if (!isset($_SESSION["brutforce"])) {
            $_SESSION["brutforce"] = 1;
        } else {
            $_SESSION["brutforce"]++;
        }

        if ($_SESSION["brutforce"] > 3) {
                die("<h3>Blocage attaque force brute, trop de tentatives !</h3>");
        }
        

    }
}
    echo "<pre>"; var_dump($_SESSION); echo "</pre>";
