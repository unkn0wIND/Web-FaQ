<?php

require('actions/database.php');

if (isset($_POST['validate'])) {  // Vérifie si la variable validate du html est appeler

    // Vérifie si tout les champs sont rentrer alors on fait :
    if (!empty($_POST['pseudo'] && !empty($_POST['password']))) {
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        // Vérifier si le mdp correspond au mdp crypté lors de l'inscription
        $user_password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);

        //Vérification pour savoir si l'utilisateur avec le pseudo entrer est bien dans la table users
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        //Si l'utilisateur éxiste, pour savoir ceci c'est grâce à rowCount > 0
        //Si l'utilisateur éxiste bien on va alors éxécuter le code sinon on affiche le message d'erreur
        if ($checkIfUserExists->rowCount() > 0) {

            //Récuperer les données de l'utilisateur
            $userInfo = $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct entre le mot de passe en clair le mdp hasher de la bdd
            if (password_verify($user_password, $userInfo['password'])) {

                //Authentification de l'utilisateur qui a été crée et récuperer les  donnée dans les sessions
                $_SESSION['auth']      = true;
                $_SESSION['id']        = $userInfo['id'];
                $_SESSION['lastname']  = $userInfo['lastname'];
                $_SESSION['firstname'] = $userInfo['firstname'];
                $_SESSION['pseudo']    = $userInfo['pseudo'];

                //Rediriger l'utilisateur sur la page d'index
                header('Location: index.php');
            } else {
                $errorMsg = "Votre mot de passe est incorrect !";
            }
        } else {
            $errorMsg = "Votre pseudo est incorrect !";
        }
    } else {
        $errorMsg = "Veuillez compléter tous les champs"; // Si tout les champs ne sont pas rempli alors envoyer ce message
    }
}
