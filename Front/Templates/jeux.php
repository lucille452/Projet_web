<?php
include '../../Server/Pages/jeux.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jeux - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../Css/jeux.css" />
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="accueil_admin.php"><img src="../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
                <li><a href="accueil_admin.php">Accueil</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="jeux.php" class="active">Jeux</a></li>
                <li><a href="connexion.php">Déconnexion</a></li>
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
    <button type="button" id="add_jeu_btn">Rajouter un jeu</button>
    <form action="" method="post" id="add_jeu"></form>
</main>

<!-- Footer -->
<footer>
    <div class="container flex">
        <div class="footer-about">
            <h2>About</h2>
            <p>
                Nous sommes l'entreprise de restauration Restôt,
                nous avons lancé un site web pour les commandes en ligne après une campagne réussie.
                Une base de données relationnelle a été mise en place pour optimiser la gestion des commandes,
                menus et clients, renforçant ainsi la position de Restôt sur le marché.
            </p>
        </div>

        <div class="footer-category">
            <h2>What you can discover</h2>

            <ul>
                <li>Biryani</li>
                <li>Chicken</li>
                <li>Pizza</li>
                <li>Burger</li>
                <li>Pasta</li>
            </ul>
        </div>

        <div class="get-in-touch">
            <h2>Get in touch</h2>
            <ul>
                <li>Account</li>
                <li>Support Center</li>
                <li>Feedback</li>
                <li>Suggession</li>
            </ul>
        </div>
    </div>

    <div class="copyright">
        <p>Copyright &copy; 2024. All Rights Reserved.</p>
    </div>
</footer>
<!-- End Footer -->

<script src="../Js/jeu.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        addFormJeu()
    });
</script>
</body>
</html>