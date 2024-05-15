<?php

include 'middlewares.php';

function addArticleController($bdd)
{
    if (isset($_POST['addArticle'])) {
        addArticleMiddleware($bdd);
    }
}

function deleteArticleController($bdd)
{
    if (isset($_POST['supprimer'])) {
        deleteArticleMiddleware($bdd);
    }
}