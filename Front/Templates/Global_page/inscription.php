<?php
include "../../Server/Pages/inscription.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - GameNexus</title>
  <link rel="stylesheet" href="../../Css/conn_insc_mdpo.css">
</head>
<body>
<div class="container">
  <form action="" method="post">
    <h2>Inscription à GameNexus</h2>
    <div class="input-group">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required>
    </div>
    <div class="input-group">
      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required>
    </div>
    <div class="input-group">
      <label for="email">Adresse Email :</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="input-group">
      <label for="date_naissance">Date de Naissance :</label>
      <input type="date" id="date_naissance" name="date_naissance" required>
    </div>
    <div class="input-group">
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="input-group">
      <label for="confirm_password">Confirmation du mot de passe :</label>
      <input type="password" id="confirm_password" name="confirm_password" required>
    </div>
    <input type="submit" name="submit" value="S'inscrire">
    <div class="signup-link">
      <p>Vous avez déjà un compte ? <a href="connexion.php" style="color: white;">Connectez-vous ici</a>.</p>
    </div>
  </form>
</div>
</body>
</html>