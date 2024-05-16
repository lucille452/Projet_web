<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panier - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="../../Css/Structure/base.css">
    <link rel="stylesheet" href="../../Css/Structure/header.css">
    <link rel="stylesheet" href="../../Css/Structure/dialog.css">
    <link rel="stylesheet" href="../../Css/Membre/panier.css" />
    <link rel="shortcut icon" type="image/png" href="../../Image/logo.png"/>
</head>
<body id="body">

<header>
    <nav>
        <ul>
            <li><a href="accueil_membre.php"><img src="../../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
                <li><a href="accueil_membre.php">Accueil</a></li>
                <li><a href="panier.php" class="active">Panier</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="../Global_page/connexion.php">Déconnexion</a></li>
            </div>
        </ul>
    </nav>
</header>

<main class="page">
    <section class="shopping-cart dark">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <?php
                            include '../../../Server/Articles/controllers.php';
                            $bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

                            getArticles($bdd);
                            if (deleteArticleController($bdd)) {
                                header("Location: panier.php");
                                exit;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Récapitulatif de commande</h3>
                            <div class="summary-item"><span class="text">Sous total</span><span class="price"><?php echo getTotalPrix($bdd)?>€</span></div>
                            <input type="hidden" name="prixTotal" value="<?php echo getTotalPrix($bdd)?>">
                            <div class="summary-item"><span class="text">Remise</span><span class="price">0€</span></div>
                            <div class="summary-item"><span class="text">Total</span><span class="price"><?php echo getTotalPrix($bdd)?>€</span></div>
                            <button type="button" class="btn btn-primary btn-lg btn-block">Payer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer>
    <div class="container2 flex">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>