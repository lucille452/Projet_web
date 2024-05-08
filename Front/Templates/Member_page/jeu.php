<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nom du jeu - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Css/jeu.css" />
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="accueil_membre.php"><img src="../../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
                <li><a href="accueil_membre.php" class="active">Accueil</a></li>
                <li><a href="panier.php">Panier</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="../Global_page/connexion.php">Déconnexion</a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
    <div class="game-details">
        <img src="../../Image/jeu1.jpg" alt="Nom du jeu">
        <h1 class="game-title">Nom du jeu</h1>
        <p class="quantity-price">Quantité: 10 | Prix: 51€</p>
        <p class="description">Description du jeu : "The Legend of Zelda: Breath of the Wild" est un jeu vidéo d'action-aventure développé et publié par Nintendo. Sorti en 2017 sur la console Nintendo Switch et la Wii U, il offre aux joueurs une expérience immersive dans un vaste monde ouvert. Dans ce jeu, les joueurs contrôlent Link, le protagoniste, alors qu'il explore le royaume de Hyrule après un long sommeil. Le jeu se distingue par sa liberté d'exploration, ses mécaniques de jeu innovantes, telles que la grimpe, la cuisine et la manipulation des éléments de l'environnement, ainsi que ses énigmes et ses combats stimulants. "Breath of the Wild" est acclamé par la critique pour son design novateur et sa beauté visuelle, et il est largement considéré comme l'un des meilleurs jeux de tous les temps.</p>
        <button id="addToCart" class="add-to-cart-btn">Ajouter au panier</button>
        <div class="game-navigation">
            <button class="prev-btn">&#10094;</button>
            <button class="next-btn">&#10095;</button>
        </div>
        <a href="accueil_membre.php" class="close-btn">&times;</a>
    </div>
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

</body>
</html>
