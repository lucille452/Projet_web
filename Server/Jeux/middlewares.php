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
        addImage($bdd);
    } else {
        echo 'Veuillez remplir tous les champs';
    }
}

function updateJeuMiddleware($bdd)
{
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $code = $_POST['code'];
    $id = $_POST['id'];

    if (!empty($nom) && !empty($description) && !empty($quantite) && !empty($prix) && !empty($code) && !empty($id)) {
        updateJeu($bdd, $nom, $description, $quantite, $prix, $code, $id);
    } else {
        echo "Veuillez remplir tous les champs";
    }

}

function deleteJeuMiddleware($bdd)
{
    $id = $_POST['id'];

    if (!empty($id)) {
        deleteJeu($bdd, $id);
    } else {
        echo "ID non trouvé";
    }
}