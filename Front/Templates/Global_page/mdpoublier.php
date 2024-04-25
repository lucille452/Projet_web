<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mot de passe oublié - GameNexus</title>
  <link rel="stylesheet" href="../../Css/conn_insc_mdpo.css">
</head>
<body>
<div class="container">
  <form action="#">
    <h2>Mot de passe oublié</h2>
    <div class="input-group">
      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required>
    </div>
    <div class="input-group">
      <label for="email">Adresse Email :</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="input-group">
      <label for="new_password">Nouveau mot de passe :</label>
      <input type="password" id="new_password" name="new_password" required>
    </div>
    <div class="input-group">
      <label for="confirm_new_password">Confirmation du nouveau mot de passe :</label>
      <input type="password" id="confirm_new_password" name="confirm_new_password" required>
    </div>
    <button type="submit">Réinitialiser le mot de passe</button>
    <div class="signup-link">
      <p>Retour à la <a href="connexion.php" style="color: white;">page de connexion</a>.</p>
    </div>
  </form>
</div>
</body>
</html>
