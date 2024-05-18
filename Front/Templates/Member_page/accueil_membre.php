<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Css/accueil_membre.css" />
    <link rel="shortcut icon" type="image/png" href="../../Image/logo.png"/>
</head>
<body>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');
include '../../../Server/Jeux/services.php';
include '../../../Server/Articles/controllers.php';
addArticleController($bdd);

// Traitement de la recherche
$searchResults = [];
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = $bdd->prepare("SELECT * FROM jeux WHERE nom LIKE ?");
    $query->execute(["%$search%"]);
    $searchResults = $query->fetchAll(PDO::FETCH_ASSOC);
}
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
    <div class="search-container">
        <form action="" method="get">
            <input name="search" placeholder="Rechercher" type="text">
            <button type="submit"></button>
        </form>
    </div>

    <article>
        <?php if(isset($_GET['search'])): ?>
            <div class="search-results">
                <h2>Résultats de la recherche pour "<?php echo $_GET['search']; ?>" :</h2>
                <ul id="list">
                    <?php
                    // Pagination
                    $itemsPerPage = 5;
                    $totalResults = count($searchResults);
                    $totalPages = ceil($totalResults / $itemsPerPage);
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $currentPage = max(1, min($totalPages, intval($currentPage)));
                    $offset = ($currentPage - 1) * $itemsPerPage;

                    $currentPageResults = array_slice($searchResults, $offset, $itemsPerPage);

                    foreach($currentPageResults as $result): ?>
                        <li data-id="<?php echo $result['id']; ?>">
                            <a href="http://localhost/Projet_web/Front/Templates/Member_page/jeu.php?id=<?php echo $result['id']; ?>">
                                <img src='../../Image/Jeu/jeu<?php echo $result['id']; ?>.jpg' alt=''>
                            </a>
                            <p><?php echo $result['nom']; ?></p> <!-- Ajout du titre du jeu -->
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    if ($currentPage > 1) {
                        echo "<a href='?search=".urlencode($_GET['search'])."&page=1'>Première</a>";
                        $prev_page = $currentPage - 1;
                        echo "<a href='?search=".urlencode($_GET['search'])."&page=$prev_page'>Précédente</a>";
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        $active = ($i == $currentPage) ? "active" : "";
                        echo "<a class='$active' href='?search=".urlencode($_GET['search'])."&page=$i'>$i</a>";
                    }

                    if ($currentPage < $totalPages) {
                        $next_page = $currentPage + 1;
                        echo "<a href='?search=".urlencode($_GET['search'])."&page=$next_page'>Suivante</a>";
                        echo "<a href='?search=".urlencode($_GET['search'])."&page=$totalPages'>Dernière</a>";
                    }
                    ?>
                </div>
            </div>
        <?php else: ?>
            <?php include "../../../Server/afficher_jeux.php"; ?>
        <?php endif; ?>
    </article>
</main>

<!-- Footer -->
<footer>
    <div class="container flex">
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

</body>
<script src="../../Js/membre/jeux.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        openDetailsPage()
    })
</script>
</html>
