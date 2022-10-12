<?php

require('actions/database.php');


//Récupérer tous les messages de l'auteur et du destinataire
$recupMessage = $bdd->prepare('SELECT * FROM message WHERE id_auteur = ? AND id_destinataire = ? OR id_auteur = ? AND id_destinataire = ? ORDER BY id ASC');
$recupMessage->execute(array($_SESSION['id'], $user_select, $user_select, $_SESSION['id']));
