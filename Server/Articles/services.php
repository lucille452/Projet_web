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
    session_start();

    $id = $bdd->prepare("SELECT id FROM membres WHERE adresse_mail=? AND mot_de_passe=?");
    $id->execute([$_SESSION['mail'], $_SESSION['mdp']]);

    return $id->fetchColumn();

}