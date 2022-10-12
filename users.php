<?php
session_start();
include 'includes/head.php';
include 'includes/navbar.php';
require('actions/chat/AllUsersAction.php');
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <br>

    <div class="container">
        <h1>Voici les membres inscrit sur le site</h1><br>
        <?php
        while ($user = $recupUser->fetch()) {
        ?>
            <div class="card">
                <div class="card-body">
                    Envoyer un message privé à <a href="chat.php?id=<?php echo $user['id']; ?>"><?php echo $user['pseudo']; ?></a>
                </div>
            </div>
            <br>
        <?php
        }
        ?>
    </div>

</body>

</html>