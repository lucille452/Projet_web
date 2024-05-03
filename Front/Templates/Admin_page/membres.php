<?php
include "../../../Server/Pages/membres.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Membres - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Css/membres.css" />
    <style>

    </style>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="accueil_admin.php"><img src="../../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
                <li><a href="accueil_admin.php">Tableau de bord</a></li>
                <li><a href="membres.php" class="active">Membres</a></li>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="../Global_page/connexion.php">Déconnexion</a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
    <h1>Tous les Membres</h1>
    <table>
        <thead>
        <tr>
            <th scope='col'>Nom</th>
            <th scope='col'>Prénom</th>
            <th scope='col'>Adresse mail</th>
            <th scope='col'>Date de naissance</th>
            <th scope='col'>Solde</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');
            getMembres($bdd);
        ?>
        </tbody>
    </table>
</main>

<script src="../../Js/membres.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        addUpdateMembre()
        dialog()
        closeDialog()
    });
</script>

</body>
</html>