<?php

require('actions/database.php');

//Récuperer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id, id_author, title, description, pseudo_author, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

//Vérifier si une recherche a été rentrée par l'utilisateur
if (isset($_GET['search']) and !empty($_GET['search'])) {

    //La recherche
    $userSearch = $_GET['search'];

    //Récupérer toute les questions qui ont la valeur taper dans la barre de recherche, % LaRecherche % c'est à dire récupérer toute les valeur où userSearch est présent par ordre décroissant
    $getAllQuestions = $bdd->query('SELECT id, id_author, title, description, pseudo_author, date_publication FROM questions WHERE title LIKE "%' . $userSearch . '%" ORDER BY id DESC');
}
