<?php

require('actions/database.php');

//Vérifier si l'id de la question est bien passer en paramètre dans l'url
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $idOfQuestion = $_GET['id'];

    //Vérifier si la question éxiste
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    //RowCount sert à savoir si il ya une question donc si c'est supérieur à 0 c'est qu'il ya bien une question
    if ($checkIfQuestionExists->rowCount() > 0) {

        //Récuperer les données de la question
        $questionInfos = $checkIfQuestionExists->fetch();
        if ($questionInfos['id_author'] == $_SESSION['id']) {

            $question_title = $questionInfos['title'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['content'];

            //Fonction qui sert à enlever les <br>
            $question_content = str_replace('<br />', '', $question_content);
        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }
    } else {
        $errorMsg = "Aucune question n'a été trouvée";
    }
} else {
    $errorMsg = "Aucune question n'a été trouvée";
}
