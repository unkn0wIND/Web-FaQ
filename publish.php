<!DOCTYPE html>
<html lang="fr">

<?php

require('actions/users/securityAction.php');
require('actions/questions/publishAction.php');
include 'includes/head.php';
include 'includes/navbar.php';

?>

<body>


    <form class="container" method="POST">

        <br>
        <!--  inclusion du message d'erreur si tout n'est pas rempli -->
        <?php if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } elseif (isset($successMsg)) {
            echo '<p>' . $successMsg . '</p>';
        }
        ?>

        <br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">L'objet de la question</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
            <textarea name="content" class="form-control"></textarea>
        </div>


        <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>

    </form>

</body>

</html>