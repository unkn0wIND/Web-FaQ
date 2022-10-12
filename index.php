<?php
session_start();
include 'includes/head.php';
include 'includes/navbar.php';
require('actions/questions/showAllAction.php');
?>

<!DOCTYPE html>
<html lang="fr">


<body>
    <br><br>
    <div class="container">
        <img src="assets/faq.png" alt="logo" width="500">
        <form method="GET">
            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>

                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php
        while ($questions = $getAllQuestions->fetch()) {
        ?>
            <div class="card">
                <div class="card-header">
                    <strong>Titre de la question</strong> : <?php echo $questions['title']; ?>
                    <a href="question.php?id=<?php echo $questions['id'] ?>">Voir la question</a>
                </div>
                <div class="card-body">
                    <strong>Objet de la question</strong> : <?php echo $questions['description']; ?>
                </div>
                <div class="card-footer">
                    Publié par <a href="profile.php?id=<?= $questions['id_author']; ?>"><?php echo $questions['pseudo_author']; ?></a> le <?php echo $questions['date_publication']; ?></a>
                </div>
            </div>
            <br>
        <?php
        }
        ?>

    </div>


</body>




</html>