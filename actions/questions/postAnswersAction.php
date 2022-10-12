<?php

require('actions/database.php');

//Vérifier si l'utilisateur a cliquer sur le boutton Répondre
if (isset($_POST['validate'])) {

    //Vérifier si des valeurs sont présent dans le textarea
    if (!empty($_POST['answer'])) {

        //nl2br permet à l'utilisateur de faire des saut de lignes
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        //Insertion des données dans la base de donnée, dans la table Answers
        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_author, pseudo_author, id_question, content)VALUES(?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer));

        //$_SESSION['id']     =  L'identifiant de la personne qui veut ajouter une réponse
        //$_SESSION['pseudo'] =  Le pseudo de la personne
        //$idOfTheQuestion    =  L'id de la question qui est stocké dans showQuestionContentAction.php
        //$user_answer        =  Le champ content qui est $user_answer

        //Message de confirmation si la réponse a bien été publiée
        $successMsg = "Votre réponse a bien été publiée sur le site";
    }
}
