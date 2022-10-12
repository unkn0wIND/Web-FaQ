<?php
require('actions/users/securityAction.php');
include 'includes/head.php';
include 'includes/navbar.php';
require('actions/chat/SendMessageAction.php');
require('actions/chat/DumpMessageAction.php');
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <br>
    <div class="container">

    
        <div class="card">
            <?php
            while ($message = $recupMessage->fetch()) {

                if ($message['id_destinataire'] == $_SESSION['id']) {
            ?>
                    <div class="card-header">
                        Ce message a été envoyer le <?php echo $message['date_send']; ?>
                    </div>
                    <div class="card-body">
                        <p style="color:red;"><?php echo $message['message']; ?></p>
                    </div>
                <?php
                } elseif ($message['id_destinataire'] == $user_select) {
                ?>
                    <div class="card-header">
                        Ce message a été envoyer le <?php echo $message['date_send']; ?>
                    </div>
                    <div class="card-body">
                        <p style="color:green;"><?php echo $message['message']; ?></p>
                    </div>
            <?php
                }
            }

            ?>
        </div>

    </div>

    <form class="container" method="POST">

        <br>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Entrer votre message</label>
            <textarea name="message" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Envoyer le message</button>

    </form>

</body>

</html>