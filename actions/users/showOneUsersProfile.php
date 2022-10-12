<?php

require('actions/database.php');

//Récupérer l'identifiant de l'utilisateur
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //L'identifiant de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur éxiste dans table
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, lastname, firstname FROM users WHERE id=?');
    $checkIfUserExists->execute(array($idOfUser));

    //Vérifier si l'utilisateur éxiste, si c'est plus grand que 0 c'est qu'il éxiste 
    if ($checkIfUserExists->rowCount() > 0) {

        $userInfos = $checkIfUserExists->fetch();
        $user_pseudo = $userInfos['pseudo'];
        $user_lastname = $userInfos['lastname'];
        $user_firstname = $userInfos['firstname'];

        //Récupérer toutes les questions publiées par l'utilisateur
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_author=? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));
    } else {
        $errorMsg = "Aucun utilisateur trouvé";
    }
} else {
    $errorMsg = "Aucun utilisateur trouvé";
}
