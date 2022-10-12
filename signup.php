<!DOCTYPE html>
<html lang="fr">

<!--  inclusion du header -->
<?php
require('actions/users/signupAction.php');
include 'includes/head.php';
include 'includes/navbar.php';
?>


<body>


    <br><br>
    <form class="container" method="POST">

        <!--  inclusion du message d'erreur si tout n'est pas rempli -->
        <?php if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } ?>

        <h1>Veuillez vous inscrire pour utiliser la plateforme</h1><br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
        <br><br>
        <a href="login.php">
            <p>Vous avez déjà un compte ? connectez-vous !</p>
        </a>
    </form>

</body>





</html>