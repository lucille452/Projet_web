<?php

function addArticle($bdd, $idMembre, $idJeu)
{
    $newArticle = $bdd->prepare("INSERT INTO articles(id_membre, id_jeu) VALUES (?, ?)");
    $newArticle->execute([$idMembre, $idJeu]);
}

function deleteArticle($bdd, $id)
{
    $deleteArticle = $bdd->prepare("DELETE FROM articles WHERE id=?");
    $deleteArticle->execute([$id]);
}

function getIdMembre($bdd)
{
    @session_start();

    $id = $bdd->prepare("SELECT id FROM membres WHERE adresse_mail=? AND mot_de_passe=?");
    $id->execute([$_SESSION['mail'], $_SESSION['mdp']]);

    return $id->fetchColumn();

}

function getArticlesPanier($bdd)
{
    $articles = $bdd->prepare("SELECT * FROM articles WHERE id_membre=?");
    $articles->execute([getIdMembre($bdd)]);

    if ($articles->rowCount() > 0) {
        while ($article = $articles->fetch(PDO::FETCH_ASSOC)) {
            $jeu = $bdd->prepare("SELECT * FROM jeux WHERE id=?");
            $jeu->execute([$article['id_jeu']]);

            while ($row = $jeu->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product'><div class='row'><div class='col-md-3'>";
                echo "<img class='img-fluid mx-auto d-block image' src='../../../Front/Image/Jeu/jeu" . $article['id_jeu'] . ".jpg'></div>";
                echo "<div class='col-md-8'><div class='info'><div class='row'><div class='col-md-5 product-name'><div class='product-name'>";
                echo "<a href='#'>" . $row['nom'] . "</a>";
                echo "<div class='product-info'><div><span class='value'>" . $row['quantité'] . "</span> en stock</div></div></div></div>";
                echo "<div class='col-md-4 quantity'><label>Quantité :</label>";
                echo "<input type='number' value ='1' class='form-control quantity-input'></div>";
                echo "<div class='col-md-3 price'><span>" . $row['prix'] . "€</span>";
                echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#supModal" . $article['id'] . "'><img src='../../../Front/Image/supprimer.png'></button></div></div></div></div></div></div>";
                dialogPanier($article['id'], $row['nom']);
            }
        }
    } else {
        echo "<div class='product'><div class='row'>Vous n'avez pas encore de jeu dans le panier</div></div>";
    }
}

function dialogPanier($id, $nom)
{
        // Modal correspondant
        echo "<div class='modal fade' id='supModal" . $id . "' tabindex='-1' role='dialog' aria-labelledby='supModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='supModalLabel'>Voulez-vous supprimer le jeu " . $nom . " ?</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='id' value='". $id ."'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Annuler</button>";
        echo "<button type='submit' name='supprimer' class='btn btn-danger'>Supprimer</button>";
        echo "</form></div></div></div></div>";
}


function getTotalPrix($bdd)
{
    $jeux = $bdd->prepare("SELECT * FROM jeux LEFT JOIN articles ON jeux.id = articles.id_jeu WHERE articles.id_membre=?");
    $jeux->execute([getIdMembre($bdd)]);

    $total = 0;
    while ($row = $jeux->fetch(PDO::FETCH_ASSOC)) {
        $total += $row['prix'];
    }

    return $total;
}

function getHiddenIDArticle($bdd)
{
    $articles = $bdd->prepare("SELECT * FROM jeux LEFT JOIN articles ON jeux.id = articles.id_jeu WHERE articles.id_membre=?");
    $articles->execute([getIdMembre($bdd)]);

    while ($row = $articles->fetch(PDO::FETCH_ASSOC)) {
        echo "<input type='hidden' name='article". $row['id'] ."' value='". $row['id'] ."'>";
    }
}

function getNbrArticle($bdd)
{
    $nbrArticle = $bdd->prepare("SELECT COUNT(*) FROM articles WHERE id_membre=?");
    return $nbrArticle->execute([getIdMembre($bdd)]);
}

function updateQuantite($bdd)
{
    $jeux = $bdd->prepare("SELECT * FROM articles LEFT JOIN jeux ON jeux.id = articles.id_jeu WHERE articles.id_membre=?");
    $jeux->execute([getIdMembre($bdd)]);

    while ($row = $jeux->fetch(PDO::FETCH_ASSOC)) {
        $updateQuantite = $bdd->prepare("UPDATE jeux SET quantité = quantité - ? WHERE id = ? ");
        $updateQuantite->execute([1, $row['id']]);
    }
}

function getArticlesFacture($bdd)
{
    $articles = $bdd->prepare("SELECT * FROM articles LEFT JOIN jeux ON jeux.id = articles.id_jeu WHERE articles.id_membre=?");
    $articles->execute([getIdMembre($bdd)]);

    while ($row = $articles->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>1</td>";
        echo "<td>". $row['nom'] ."</td>";
        echo "<td>". $row['prix'] ."</td></tr>";
    }
}