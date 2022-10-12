<?php

session_start();
if (!isset($_SESSION['auth'])) { //la variable auth est dans loginAction.php
    header('Location: ../../login.php');
}

require('../database.php');

//Vérifier si l'id est bien passer dans l'url, la fonction isset permet de savoir si une variable est bien déclarer
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //Variable qui stock l'id passer par l'url
    $idOfTheQuestion = $_GET['id'];

    //Requête pour parcourir la table pour savoir si la question éxiste dans la bdd
    $checkIfQuestionExists = $bdd->prepare('SELECT id_author FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));


    //Vérifier si la question éxiste
    if ($checkIfQuestionExists->rowCount() > 0) {

        $questionInfos = $checkIfQuestionExists->fetch();

        //Vérifier si l'utilisateur est bien l'auteur de la question
        if ($questionInfos['id_author'] == $_SESSION['id']) {

            //Supprimer une question de la table question qui possède l'identifiant de la question passer dans l'url
            $deteleThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deteleThisQuestion->execute(array($idOfTheQuestion));

            //Redirection une fois la question supprimer
            header('Location: ../../my-questions.php');
        } else {
            echo "Vous n'avez pas le droit de supprimer une question qui ne vous appartient pas !";
        }
    } else {
        echo "Aucune question n'a été trouvé";
    }
} else {
    echo "Aucune question n'a été trouvé";
}
