<?php
include 'services.php';

function addArticleMiddleware($bdd)
{
    $idJeu = $_POST['id'];
    $idMembre = getIdMembre($bdd);

    addArticle($bdd, $idMembre, $idJeu);
}

function deleteArticleMiddleware($bdd)
{
    $id = $_POST['id'];

    deleteArticle($bdd, $id);
}
