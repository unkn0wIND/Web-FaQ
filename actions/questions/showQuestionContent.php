<?php

require('actions/database.php');

//Vérifier si l'id de la question est rentrer dans l'URL
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //Récupérer l'identifiant de la question
    $idOfTheQuestion = $_GET['id'];

    //Vérifier si la question éxiste
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if ($checkIfQuestionExists->rowCount() > 0) {

        //Récupérer toutes les données de la question
        $questionInfos = $checkIfQuestionExists->fetch();

        //Stocker les donnée de la question dans des variables
        $question_title = $questionInfos['title'];
        $question_content = $questionInfos['content'];
        $question_id_author = $questionInfos['id_author'];
        $question_pseudo_author = $questionInfos['pseudo_author'];
        $question_publication_date = $questionInfos['date_publication'];
    } else {

        $errorMsg = "Aucune question n'a été trouvée";
    }
} else {
    $errorMsg = "Aucune question n'a été trouvée";
}
