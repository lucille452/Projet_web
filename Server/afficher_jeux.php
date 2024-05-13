<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

$totalJeux = $bdd->query("SELECT COUNT(*) FROM jeux");
$nbrJeux = $totalJeux->fetchColumn();

$itemsPerPage = ceil($nbrJeux / 3); // Correction : Utilisation de ceil() pour obtenir le nombre d'éléments par page
$totalPages = ceil($nbrJeux / $itemsPerPage); // Correction : Calcul du nombre total de pages

// Obtenez la page actuelle à partir de la chaîne de requête, par défaut, c'est 1
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$current_page = max(1, min($totalPages, intval($current_page))); // Correction : Assurez-vous que la page actuelle est dans la plage valide

// Calculez le décalage
$offset = ($current_page - 1) * $itemsPerPage;

// Exemple d'éléments pour la pagination
$jeux = $bdd->prepare("SELECT * FROM jeux LIMIT ?, ?"); // Correction : Utilisation de LIMIT pour obtenir les jeux de la page actuelle
$jeux->bindParam(1, $offset, PDO::PARAM_INT);
$jeux->bindParam(2, $itemsPerPage, PDO::PARAM_INT);
$jeux->execute();

// Afficher les éléments pour la page actuelle
echo "<ul id='list'>";
while ($row = $jeux->fetch(PDO::FETCH_ASSOC)) {
    echo "<li data-id='". $row['id'] ."'><a><img src='../../Image/Jeu/jeu". $row['id'] .".jpg' alt=''></a></li>";
}
echo "</ul>";

// Afficher les liens de pagination
echo "<div class='pagination'>";
if ($current_page > 1) {
    echo "<a href='?page=1'>Première</a>"; // Correction : "First" en "Première"
    $prev_page = $current_page - 1;
    echo "<a href='?page=$prev_page'>Précédente</a>"; // Correction : "Previous" en "Précédente"
}

for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $totalPages); $i++) {
    $active = ($i == $current_page) ? "active" : "";
    echo "<a class='$active' href='?page=$i'>$i</a>";
}

if ($current_page < $totalPages) {
    $next_page = $current_page + 1;
    echo "<a href='?page=$next_page'>Suivante</a>"; // Correction : "Next" en "Suivante"
    echo "<a href='?page=$totalPages'>Dernière</a>"; // Correction : "Last" en "Dernière"
}
echo "</div>";
?>
