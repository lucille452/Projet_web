<?php
include '../../../Server/Pages/connexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - GameNexus</title>
    <link rel="stylesheet" href="../../Css/conn_insc_mdpo.css">
</head>
<body>
<div class="container">
    <form action="" method="post">
        <h2>Connexion à GameNexus</h2>
        <div class="input-group">
            <label for="email">Adresse Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <div class="forgot-password">
                <a href="mdpoublier.php">Mot de passe oublié ?</a>
            </div>
        </div>
        <input type="submit" name="submit" value="Se connecter">
        <div class="signup-link">
            <p>Vous n'avez pas de compte ? <a href="inscription.php" style="color: white;">Inscrivez-vous ici</a>.</p>
        </div>
    </form>
</div>
</body>
</html>
