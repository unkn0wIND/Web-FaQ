<?php

require('actions/database.php');

//Vérifier si l'id est bien présent et qu'il n'est pas vide
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //Variable pour récupérer l'id
    $user_select =  $_GET['id'];

    //Récupérer les utilisateurs avec l'id
    $recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $recupUser->execute(array($user_select));

    //Si l'utilisateur est bien récupérer alors on éxécute le code
    if ($recupUser->rowCount() > 0) {

        //Si l'utilisateur a cliquer sur le boutton envoyer et que le message n'est pas vide alors 
        if (isset($_POST['validate']) and !empty($_POST['message'])) {

            //Encrypter le message avec nl2br pour les sauts de ligne et htmlspecialchars pour éviter les balise html dans le message
            $message = nl2br(htmlspecialchars($_POST['message']));
            $send_date = Date('d/m/Y à H:i:s'); //Date du message envoyé
            //Insertion du message dans la base de donnée
            $insertMessage = $bdd->prepare('INSERT INTO message(message, id_destinataire, id_auteur, date_send) VALUES (?, ?, ?, ?)');
            $insertMessage->execute(array($message, $user_select, $_SESSION['id'], $send_date));
        }
    } else {
        echo "Aucun utilisateur trouvé"; // En cas d'erreur
    }
} else {
    echo "Aucun identifiant trouvé"; // En cas d'erreur
}
