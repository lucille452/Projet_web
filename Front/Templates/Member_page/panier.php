<?php
include "../../../Server/Pages/panier.php";
?>

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
                            $bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

                            getArticles($bdd);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <form action="" method="post">
                            <h3>Récapitulatif de commande</h3>
                            <div class="summary-item"><span class="text">Sous total</span><span class="price"><?php echo getTotalPrix($bdd)?>€</span></div>
                            <input type="hidden" name="prixTotal" value="<?php echo getTotalPrix($bdd)?>">
                                <?php
                                getHiddenIDArticle($bdd);
                                ?>
                            <div class="summary-item"><span class="text">Remise</span><span class="price">0€</span></div>
                            <div class="summary-item"><span class="text">Total</span><span class="price"><?php echo getTotalPrix($bdd)?>€</span></div>
                            <input type="submit" class="btn btn-primary btn-lg btn-block" name="payer" value="Payer" data-toggle='modal' data-target='#supModal'>
                            </form>
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
            <h2>À propos</h2>
            <p>
                Game Nexus, fondée en 2022, est une entreprise dynamique spécialisée dans la vente de jeux vidéo en ligne.
                Nous proposons un catalogue diversifié, régulièrement mis à jour avec les dernières nouveautés et les classiques
                du jeu vidéo, en collaboration avec les plus grands éditeurs. Notre mission est de fournir une plateforme fiable
                et accessible pour découvrir, acheter et télécharger des jeux, tout en créant une communauté dynamique de joueurs.
                Nous aspirons à devenir la référence mondiale en offrant une expérience utilisateur exceptionnelle, des promotions
                exclusives et un support client de qualité.
            </p>
        </div>

        <div class="footer-category">
            <h2>Services</h2>

            <ul>
                <li>Téléchargement immédiat</li>
                <li>Offres promotionnelles</li>
                <li>Avis et recommandations</li>
                <li>Communauté</li>
                <li>Support client</li>
            </ul>
        </div>

        <div class="get-in-touch">
            <h2>Valeurs</h2>
            <ul>
                <li>Passion pour le jeu</li>
                <li>Innovation</li>
                <li>Intégrité</li>
                <li>Communauté</li>
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