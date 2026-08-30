<?php
  include "../actions/inscription.php";
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/inscription.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body>
    <section class='main'>
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
          <form action="../actions/inscription.php" method="POST" id="formulaire">
            <div class="input-group">
              <label for="nom">Nom</label>
              <div class="input-field name">
                <i class="bi bi-person"></i>
                <input type="text" name="nom" id="nom" class="form-control" required/>
              </div>
              <span style="display: none; color: red; margin-bottom: 5px; font-weight: lighter; font-size: 0.7rem">Caractère interdit !</span>
            </div>
            <div class="input-group">
              <label for="prenom">Prenom </label>
              <div class="input-field prename">
                <i class="bi bi-person"></i>
                <input type="text" name="prenom" id="prenom" class="form-control" required/>
              </div>
              <span style="display: none; color: red; margin-bottom: 5px; font-weight: lighter; font-size: 0.7rem">Caractère interdit !</span>
            </div>
            <div class="input-group">
              <label for="mail">Email </label>
              <div class="input-field mail">
                <i class="bi bi-envelope"></i>
                 <input type="email" name="mail" id="mail" class="form-control" required/>
              </div>
              <span style="display: none; color: red; margin-bottom: 5px; font-weight: lighter; font-size: 0.7rem">Mail incorrect !</span>
            </div>
            <div class="input-group">
              <label for="passwd">Mot de passe</label>
              <div class="input-field passwd">
                <i class="bi bi-lock"></i>
                <input type="password" name="passwd" id="passwd" class="form-control" required/>
              </div>
            </div>  
            <div class="input-group">
              <label for="passwd">Repeter le mot de passe</label>
              <div class="input-field rpasswd">
                <i class="bi bi-lock"></i>
                <input type="password" name="passwd-confirm" id="passwd-chk" class="form-control" required/>
              </div>
              <span style="display: none; color: red; margin-bottom: 5px; font-weight: lighter; font-size: 0.7rem">Les mots de passe ne correspondent pas !</span>
            </div>
            <div class="signup">
              <input type="submit" name="inscription" id="submit" value="S'inscrire" />
            </div>
          </form>
        </div>
        <p style="margin-top: 20px" class="secondary-text">Déjà inscrit ? <a href="connexion.php" style="color: #3ADD8E">Connectez-vous</a></p>
      </section>
    </section>
    <script src="../assets/js/inscription.js"></script>
  </body>
</html>