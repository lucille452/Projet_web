<?php
include 'services.php';

function addJeuMiddleware($bdd)
{
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];

    if (!empty($nom) && !empty($description) && !empty($quantite) && !empty($prix)) {
        addJeu($bdd, $nom, $description, $quantite, $prix);
    } else {
        echo 'Veuillez remplir tous les champs';
    }
}