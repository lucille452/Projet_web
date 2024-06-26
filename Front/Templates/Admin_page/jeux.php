<?php
include '../../../Server/Pages/jeux.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jeux - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Css/Admin/jeux.css" />
    <link rel="stylesheet" href="../../Css/Structure/base.css" />
    <link rel="stylesheet" href="../../Css/Structure/dialog.css" />
    <link rel="stylesheet" href="../../Css/Structure/header.css" />
    <link rel="shortcut icon" type="image/png" href="../../Image/logo.png"/>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="accueil_admin.php"><img src="../../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
                <li><a href="accueil_admin.php">Tableau de bord</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="jeux.php" class="active">Jeux</a></li>
                <li><a href="../Global_page/connexion.php">Déconnexion</a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
    <h1>Tous les Jeux</h1>
<!--    afficher liste des jeux-->
    <section>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');
    getJeux($bdd);
    ?>
    </section>
    <button type="button" id="add_jeu_btn">Ajouter un jeu</button>
    <form action="" method="post" id="add_jeu" enctype="multipart/form-data"></form>
</main>

<script src="../../Js/jeu.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        addFormJeu()
        dialogModifier()
        dialogSupprimer()
        closeModDialog()
        closeSupDialog()
    });
</script>
</body>
</html>