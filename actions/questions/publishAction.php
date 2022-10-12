<?php

require('actions/database.php');


//Vérifier si l'utilisateur a cliquer sur le boutton Publier la question
if (isset($_POST['validate'])) {

    //Si ces données ne sont pas vide on va éxécuter le code 
    if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])) {

        //Les données de la question
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = htmlspecialchars($_POST['description']);
        $question_content = nl2br(htmlspecialchars($_POST['content'])); // La fonction nl2br sert à que l'utilisateur puisse faire des saut de ligne
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];
        $question_date = date('d/m/Y');

        //Requete pour ajouter la question à la bdd
        $insertQuestion = $bdd->prepare('INSERT INTO questions(title, description, content, id_author, pseudo_author, date_publication) VALUES (?, ?, ?, ?, ?, ?)');
        $insertQuestion->execute(array($question_title, $question_description, $question_content, $question_id_author, $question_pseudo_author, $question_date));

        $successMsg = "Votre question a bien été publiée sur le site";
    } else {
        $errorMsg = "Veuillez compléter tous les champs..";
    }
}
