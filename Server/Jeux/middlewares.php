<?php
include 'services.php';

function addJeuMiddleware($bdd)
{
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $chemin = "../../Front/Image/Jeu/";

    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['image']['tmp_name'];  // Nom temporaire du fichier sur le serveur
        $name = basename($_FILES['image']['name']); // Nom du fichier original
        $path = $chemin . $name; // Chemin complet vers le fichier dans le dossier "uploads"

        // Enregistrer le fichier
        if (move_uploaded_file($tmp_name, $path)) {
            echo "Fichier enregistré avec succès : $path";
        } else {
            echo "Erreur lors de l'enregistrement du fichier.";
        }
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }

    if (!empty($nom) && !empty($description) && !empty($quantite) && !empty($prix)) {
        addJeu($bdd, $nom, $description, $quantite, $prix);
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