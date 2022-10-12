<!DOCTYPE html>
<html lang="fr">

<?php
require('actions/users/securityAction.php');
include 'includes/head.php';
include 'includes/navbar.php';
require('actions/questions/getInfosOfEditQuestionAction.php');
require('actions/questions/editQuestionAction.php');
?>


<body>

    <div class="container">

        <br>
        <?php if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } ?>

        <?php
        if (isset($question_content)) {
        ?>

            <form method="POST">

                <br>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">L'objet de la question</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $question_title ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $question_description ?>">
                </div>
                <div class=" mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea name="content" class="form-control"><?php echo $question_content ?></textarea>
                </div>


                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>

            </form>

        <?php
        }
        ?>

    </div>


</body>

</html>