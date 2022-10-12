<!DOCTYPE html>
<html lang="fr">

<?php
require('actions/users/securityAction.php');
require('actions/questions/showQuestionContent.php');
require('actions/questions/postAnswersAction.php');
require('actions/questions/showAllAnswersAction.php');
include 'includes/head.php';
include 'includes/navbar.php';
?>

<body>

    <div class="container">
        <br>
        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }



        if (isset($question_publication_date)) {
        ?>
            <section class="show-content">
                <h3><?php echo $question_title; ?></h3>
                <hr>
                <p><?php echo $question_content; ?></p>
                <hr>
                <small>Publié par <?php echo '<a href="profile.php?id=' . $question_id_author . '">' . $question_pseudo_author . '</a> le ' . $question_publication_date ?></small>
            </section>
            <br>

            <section class="show-answers">

                <form class="form-group" method="POST">

                    <?php if (isset($successMsg)) {
                        echo '<p>' . $successMsg . '</p>';
                    }
                    ?>


                    <div class="mb-3">
                        <label class="form-label">Réponse :</label>
                        <textarea name="answer" class="form-control"></textarea><br>
                        <button class="btn btn-primary" name="validate" type="submit">Répondre</button>
                    </div>
                </form>

                <?php
                while ($answer = $getAllAnswersOfThisQuestion->fetch()) {
                ?>

                    <div class="card">
                        <div class="card-header">
                            <a href="profile.php?id=<?php echo $answer['id_author']; ?>"><?php echo $answer['pseudo_author']; ?></a>
                        </div>
                        <div class="card-body">
                            <?php echo $answer['content']; ?>
                        </div>
                    </div>
                    <br>


                <?php
                }
                ?>

            </section>

        <?php
        }
        ?>




    </div>


</body>

</html>