<?php
include __DIR__ . "/../actions/reset.php";
session_start();
session_regenerate_id(true);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reinitialiser le mot de passe</title>
    <link rel="stylesheet" href="../assets/css/resetlink.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <section class='main'>
        <?php
        if(isset($_SESSION['done']) && $_SESSION['done']){
            echo "<p>Mot de passe reinitialisé. <a href='connexion.php' style='color: #3ADD8E; text-decoration: none'>Retourner à la page de connexions</a> </p>";
            unset($_SESSION['done']);
        } else {
            echo '
                <section class="formulaires">
                    <div class="text">Entrez votre nouveau mot de passe.</div>
                    <div class="form">
                            <form method="POST" action="../actions/reset.php?token=' . urlencode($_GET['token'] ?? '') . '">
                            <div>
                                <label for="passwd" class="secondary-text">Mot de passe </label>
                                <div class="mail">
                                    <i class="bi bi-lock secondary-text"></i>
                                    <input type="password" name="passwd" id="passwd" class="form-control secondary-text" required/>
                                </div>
                            </div>
                            <div>
                                <label for="passwd-chk" class="secondary-text">Repeter le mot de passe </label>
                                <div class="mail">
                                    <i class="bi bi-lock secondary-text"></i>
                                    <input type="password" name="passwd-chk" id="passwd-chk" class="form-control secondary-text" required/>
                                </div>
                            </div>
                            <div class="login">
                                <input type="submit" name="valider" value="Valider"/>
                            </div>
                        </form>
                    </div>
                </section>
            ';
        }
        ?>

    </section>
</body>
</html>