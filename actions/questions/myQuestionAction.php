<?php

require('actions/database.php');

//Récupérer toutes les questions de l'utilisateur conneter sur le site grâce à son $_SESSION_['id']
$getAllMyQuestions = $bdd->prepare('SELECT id, title, description FROM questions WHERE id_author = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));
