<?php

require('actions/database.php');  // Inclusion de database.php

if (isset($_POST['validate'])) {  // Vérifie si la variable validate du html est appeler

    // Vérifie si tout les champs sont rentrer alors on fait :
    if (!empty($_POST['pseudo'] && !empty($_POST['lastname']) && !empty($_POST['firstname'])) && !empty($_POST['password'])) {

        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlentities($_POST['lastname']);
        $user_firstname = htmlentities($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Password hasher

        //Vérification si l'utilisateur est déjà inscrit 
        //Récuperer le pseudo dans la table users qui possède le pseudo que l'utilisateur rentre
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        //Si il ya aucune donnée qui a été trouver donc égal à 0 on va éxécuter notre requete pour ajouter l'users sinon message d'erreur
        if ($checkIfUserAlreadyExists->rowCount() == 0) {

            //Insertion d'un nouveau utilisateur
            $insertUser = $bdd->prepare('INSERT INTO users(pseudo, lastname, firstname, password) VALUES (?, ?, ?, ?)');
            $insertUser->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            //Récupération des donnée de l'utilisateur qui s'est inscrit
            $getInfoOfUser = $bdd->prepare('SELECT id, pseudo, lastname, firstname FROM users WHERE lastname = ? AND firstname = ? AND pseudo = ?');
            $getInfoOfUser->execute(array($user_lastname, $user_firstname, $user_pseudo));

            //Variable qui stock toute les information de l'utilisateur récuperer
            $userInfo = $getInfoOfUser->fetch();

            //Authentification de l'utilisateur qui a été crée et récuperer les  donnée dans les sessions
            $_SESSION['auth']      = true;
            $_SESSION['id']        = $userInfo['id'];
            $_SESSION['lastname']  = $userInfo['lastname'];
            $_SESSION['firstname'] = $userInfo['firstname'];
            $_SESSION['pseudo']    = $userInfo['pseudo'];

            //Redirection sur index.php une fois authentifié
            header('Location: index.php');
        } else {
            $errorMsg = "L'utilisateur éxiste déjà sur le site";
        }
    } else {
        $errorMsg = "Veuillez compléter tous les champs"; // Si tout les champs ne sont pas rempli alors envoyer ce message
    }
}
