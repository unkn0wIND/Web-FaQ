<!DOCTYPE html>
<html lang="en">

<?php
include 'includes/navbar.php';
include 'includes/head.php';
require('actions/users/loginAction.php');
?>

<body>

    <br><br>
    <form class="container" method="POST">

        <!--  inclusion du message d'erreur si tout n'est pas rempli -->
        <?php if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } ?>

        <h1>Veuillez vous connecter pour la suite...</h1><br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>

        <br><br>
        <a href="signup.php">
            <p>Vous n'aviez pas de compte chez nous ? inscrivez-vous !</p>
        </a>
    </form>


</body>

</html>