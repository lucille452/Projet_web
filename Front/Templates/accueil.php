<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../Css/accueil.css" />
    <style>

    </style>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="accueil.html"><img src="../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="">Déconnexion</a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
<?php
// Example data
$totalItems = 15; // Total number of items
$itemsPerPage = 5; // Number of items per page
$totalPages = ceil($totalItems / $itemsPerPage); // Calculate total pages

// Get current page from query string, default is 1
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$current_page = max(1, min($totalPages, intval($current_page))); // Ensure current page is within valid range

// Calculate offset
$offset = ($current_page - 1) * $itemsPerPage;

// Example items for pagination
$items = range($offset + 1, min($totalItems, $offset + $itemsPerPage));

// Display items for the current page
echo "<ul>";
foreach ($items as $item) {
    echo "<li><a><img src='../Image/jeu". $item .".jpg'></a></li>";
}
echo "</ul>";

// Display pagination links
echo "<div class='pagination'>";
    if ($current_page > 1) {
        echo "<a href='?page=1'>First</a>";
        $prev_page = $current_page - 1;
        echo "<a href='?page=$prev_page'>Previous</a>";
    }

    for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $totalPages); $i++) {
        $active = ($i == $current_page) ? "active" : "";
        echo "<a class='$active' href='?page=$i'>$i</a>";
    }

    if ($current_page < $totalPages) {
        $next_page = $current_page + 1;
        echo "<a href='?page=$next_page'>Next</a>";
        echo "<a href='?page=$totalPages'>Last</a>";
    }
    echo "</div>";
?>
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