<?php
session_start();
require('actions/users/showOneUsersProfile.php');
include 'includes/head.php';
include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <br><br>

    <div class="container">
        <?php

        if (isset($errorMsg)) {
            echo $errorMsg;
        };

        if (isset($getHisQuestions)) {
        ?>
            <h1>Les informations de l'utilisateur</h1>
            <div class="card">
                <div class="card-body">
                    <h4>@<?php echo $user_pseudo; ?></h4>
                    <hr>
                    <p>Nom : <?php echo $user_lastname; ?></p>
                    <p>Prénom : <?php echo $user_firstname; ?></p>
                </div>
            </div>

            <br>
            <hr>
            <h1>Les questions de l'utilisateur</h1>
            <br>
            <?php

            while ($question = $getHisQuestions->fetch()) {
            ?>
                <div class="card">
                    <div class="card-header">
                        <?php echo $question['title']; ?>
                    </div>
                    <div class="card-body">
                        <?php echo $question['description']; ?>
                    </div>
                    <div class="card-footer">
                        Par <?php echo $question['pseudo_author']; ?> le <?php echo $question['date_publication']; ?>
                    </div>
                </div>
                <br>
        <?php
            }
        }

        ?>
    </div>


</body>

</html>