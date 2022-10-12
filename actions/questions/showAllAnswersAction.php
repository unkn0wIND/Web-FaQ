<?php

require('actions/database.php');

//Récupérer les données d'une réponse qui se trouve dans la table Answers qui possède l'identifiant de la question, ORDER BY par ordre décroissant
$getAllAnswersOfThisQuestion = $bdd->prepare('SELECT id_author, pseudo_author, id_question, content FROM answers WHERE id_question=? ORDER BY id DESC');
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));
