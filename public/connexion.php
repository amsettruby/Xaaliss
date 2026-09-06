<?php
  include "../actions/connexion.php";
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/connexion.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body>
    <section class='main'>
      <!-- <div class="notif">
        Inscription Reussie !
      </div> -->
      <section class="head">
        <div>
          <div class="icon">
            <i class="bi bi-wallet" style='color: #3ADD8E; font-size: 2rem'></i>
          </div>
          <hgroup>
            <h2>Xaaliss</h2>
            <span>Suivez vos dettes et créances, simplement.</span>
          </hgroup>
        </div>
      </section>

      <section class="formulaires">
        <div class="form">
          <form method="POST" action="../actions/connexion.php">
            <div>
              <label for="mail" class="secondary-text">Adresse e-mail </label>
              <div class="mail">
                <i class="bi bi-envelope secondary-text"></i>
                <input type="email" name="mail" id="mail" class="form-control secondary-text" placeholder="example@gmail.com" required/>
              </div>
            </div>

            <div>
              <label for="passwd" class="secondary-text">Mot de passe</label>
              <div class="passwd">
                <i class="bi bi-lock secondary-text"></i>
                <input type="password" name="passwd" id="passwd" class="form-control" required/>
                <i class="bi bi-eye secondary-text" id="eye"></i>
              </div>
            </div>
            <?php
              if(session_status() === PHP_SESSION_NONE) session_start();
              
              if(isset($_SESSION['error']) && $_SESSION['error']) {
                echo '<span style="display: flex; color: #FF6B5B; font-size: 0.8rem; font-weight: lighter">';
                echo "E-mail ou mot de passe incorrect !";
                echo "</span>";
                unset($_SESSION['error']);
              }
            ?>
            <div class="forgotpasswd" style="color: #3ADD8E">
               <a href="resetpasswd.php" style="color: inherit; text-decoration: none">
                Mot de passe oublié ?
               </a>
            </div>

            <div class="login">
              <input type="submit" name="connexion" value="Se connecter"/>
            </div>
          </form>
        </div>
        <p style="margin-top: 20px" class="secondary-text">Pas encore de compte ? <a href="inscription.php" style="color: #3ADD8E">Inscrivez-vous</a></p>
      </section>
    </section>
    <script src="../assets/js/connexion.js"></script>
  </body>
</html>