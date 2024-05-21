<?php

include '/xampp/htdocs/Projet_web/Server/Articles/controllers.php';
include '/xampp/htdocs/Projet_web/Server/Tableau_de_bord/services.php';
include '/xampp/htdocs/Projet_web/Server/Membres/update_solde.php';

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

if (deleteArticleController($bdd)) {
    header("Location: panier.php");
    exit;
}

if (isset($_POST['payer'])) {
    $totalPrix = $_POST['prixTotal'];

    if ($totalPrix <= getSolde($bdd)) {
//    ADMIN
        addRevenus($bdd, $totalPrix);

        $nbrArticles = getNbrArticle($bdd);
        addVentes($bdd, $nbrArticles);

//    MEMBRE
        updateSoldePaid($bdd, $totalPrix);

//    JEUX
        updateQuantite($bdd);

// delete article du panier une fois acheté
        $lastId = $bdd->prepare("SELECT id FROM articles WHERE id_membre=? ORDER BY id DESC LIMIT 1");
        $lastId->execute([getIdMembre($bdd)]);
        $id = $lastId->fetchColumn();

        for ($i = 1; $i <= intval($id); $i++) {
            if (isset($_POST['article'.$i])) {
                $idArticle = $_POST['article'.$i];
                if (!empty($idArticle)) {
                    deleteArticle($bdd, $idArticle);
                }
            }
        }
    } else {
        // Modal correspondant
        echo "<div class='modal fade' id='supModal' tabindex='-1' role='dialog' aria-labelledby='supModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='supModalLabel'>Vous n'avez pas assez d'argent, veuillez en ajouter sur votre compte.</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "</div></div></div>";
    }


}

