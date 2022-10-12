<?php

require('actions/database.php');

//Petite requête pour récupérer tous les utilisateurs du site
$recupUser = $bdd->query('SELECT * FROM users');
