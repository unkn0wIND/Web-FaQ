<?php

session_start();

//Condition qui nous permet de voir si l'user est authentifié si c'est pas le cas redirigé sur login.php
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
}
