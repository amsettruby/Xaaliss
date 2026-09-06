<?php
include __DIR__ . "/../actions/resetpasswd.php";
session_start();
$_SESSION['mailSent'] = false;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reinitialiser le mot de passe</title>
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <section class='main'>
        <?php
        echo $_SESSION['mailSent'];
        if(isset($_SESSION['mailSent'])) {
            if($_SESSION['mailSent'] === true) {
                echo "<p>Si l'adresse mail fournie existe, nous y avons envoyé un lien de reinitialisation du mot de passe.</br>Si vous ne recevez rien, consulter egalement vos spams.</p>";
                unset($_SESSION['mailSent']);
            }
        } else {
            echo '
                <section class="formulaires">
                    <div class="text">Entrez votre e-mail. Un lien vous-y seras envoyé.</div>
                    <div class="form">
                        <form method="POST" action="../actions/resetpasswd.php">
                            <div>
                                <label for="mail" class="secondary-text">Adresse e-mail </label>
                                <div class="mail">
                                    <i class="bi bi-envelope secondary-text"></i>
                                    <input type="email" name="mail" id="mail" class="form-control secondary-text" placeholder="example@gmail.com" required/>
                                </div>
                            </div>
                            <div class="login">
                                <input type="submit" name="send-link" value="Envoyer le lien"/>
                            </div>
                        </form>
                    </div>
                 </section>
            ';
        }
        ?>
    </section>
<script src="../assets/js/resetpasswd.js"></script>
</body>
</html>