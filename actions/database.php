<?php

//Connexion à la database si il ne se connecte pas envoyer un message d'erreur

try {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
} catch (Exception $e) {
    die('Erreur pa de connexion : ' . $e->getMessage());
}
