<?php
session_start();
include 'includes/head.php';
include 'includes/navbar.php';
require('actions/questions/myQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="fr">


<body>

    <div class="container">

        <?php

        while ($question = $getAllMyQuestions->fetch()) {
        ?>
            <br>
            <div class="card" style="width: 35rem;">
                <div class="card-header"><?php echo $question['title']; ?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $question['description']; ?></h5>
                    <a href="question.php?id=<?php echo $question['id'] ?>" class="btn btn-primary">Voir à la question</a>
                    <a href="edit-question.php?id=<?php echo $question['id'] ?>" class="btn btn-warning">Modifier la question</a>
                    <a href="actions/questions/deleteQuestionAction.php?id=<?php echo $question['id'] ?>" class="btn btn-danger">Supprimer la question</a>
                </div>
            </div>

        <?php
        }

        ?>
    </div>

</body>



</html>