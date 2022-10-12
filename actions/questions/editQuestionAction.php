<?php

require('actions/database.php');

//Validation du formulaire
if (isset($_POST['validate'])) {

    //Vérifier si les champs sont rempli
    if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])) {

        // Les données à faire passer dans la requête
        $new_title = htmlspecialchars($_POST['title']);
        $new_description = nl2br(htmlspecialchars($_POST['description']));
        $new_content = nl2br(htmlspecialchars($_POST['content']));

        //Mettre à jour la table question, le titre, la description et le contenu de la question qui possède l'id de la question récuperer
        $editQuestionWebsite = $bdd->prepare('UPDATE questions SET title = ?, description = ?, content = ? WHERE id = ?');
        $editQuestionWebsite->execute(array($new_title, $new_description, $new_content, $_GET['id']));

        //Redirection vers la page des question de l'utilisateur
        header('Location: my-questions.php');
    } else {
        $errorMsg = "Veuillez compléter tous les champs !";
    }
}
