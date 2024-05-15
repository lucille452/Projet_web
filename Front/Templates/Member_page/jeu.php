<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jeu - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Css/Structure/base.css" />
    <link rel="stylesheet" href="../../Css/Structure/header.css" />
    <link rel="stylesheet" href="../../Css/jeu.css" />
    <link rel="shortcut icon" type="image/png" href="../../Image/logo.png"/>
</head>
<body>

<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');
include '../../../Server/Jeux/services.php';
include '../../../Server/Articles/controllers.php';
addArticleController($bdd);

// Correction : récupération du nombre de jeux
$jeux_query = $bdd->query("SELECT COUNT(id) AS total FROM jeux");
$jeux_data = $jeux_query->fetch(PDO::FETCH_ASSOC);
$nbrJeux = $jeux_data['total'];
?>

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
        <img src="<?php echo "../../Image/Jeu/jeu". $id .".jpg"?>" alt="">
        <h1 class="game-title"><?php echo getNomJeu($id, $bdd); ?></h1>
        <p class="quantity-price">Quantité: <?php echo getQuantite($id, $bdd); ?> | Prix: <?php echo getPrix($id, $bdd);?>€</p>
        <p class="description"><?php echo getDescription($id, $bdd);?></p>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="addArticle" id="addToCart" class="add-to-cart-btn" value="Ajouter au panier">
        </form>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const maxId = <?php echo $nbrJeux; ?>;

        prevBtn.addEventListener('click', function() {
            const id = parseInt("<?php echo $id; ?>");
            if (id > 1) {
                window.location.href = `?id=${id - 1}`;
            } else {
                window.location.href = `?id=${maxId}`;
            }
        });

        nextBtn.addEventListener('click', function() {
            const id = parseInt("<?php echo $id; ?>");
            if (id < maxId) {
                window.location.href = `?id=${id + 1}`;
            } else {
                window.location.href = `?id=1`;
            }
        });
    });
</script>
</body>
</html>
