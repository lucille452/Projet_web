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

function getArticles($bdd)
{
    $articles = $bdd->prepare("SELECT * FROM articles WHERE id_membre=?");
    $articles->execute([getIdMembre($bdd)]);

    while ($article = $articles->fetch(PDO::FETCH_ASSOC)) {
        $jeu = $bdd->prepare("SELECT * FROM jeux WHERE id=?");
        $jeu->execute([$article['id_jeu']]);
        
        while ($row = $jeu->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='product'><div class='row'><div class='col-md-3'>";
            echo "<img class='img-fluid mx-auto d-block image' src='../../../Front/Image/Jeu/jeu" . $article['id_jeu'] . ".jpg'></div>";
            echo "<div class='col-md-8'><div class='info'><div class='row'><div class='col-md-5 product-name'><div class='product-name'>";
            echo "<a href='#'>" . $row['nom'] . "</a>";
            echo "<div class='product-info'><div><span class='value'>". $row['quantité'] ."</span> en stock</div></div></div></div>";
            echo "<div class='col-md-4 quantity'><label for='quantity'>Quantité :</label>";
            echo "<input id='quantity' type='number' value ='1' class='form-control quantity-input'></div>";
            echo "<div class='col-md-3 price'><span>". $row['prix'] ."€</span></div></div></div></div></div></div>";
        }
    }
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