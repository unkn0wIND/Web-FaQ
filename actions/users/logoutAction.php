<?php

//Système de session_destroy pour déconnecter l'utilisateur
session_start();
$_SESSION = [];
session_destroy();
header('Location: ../../login.php');
