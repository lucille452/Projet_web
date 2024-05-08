<?php
include 'services.php';

function addMembreMiddleware($bdd)
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['email'];
    $dateNaissance = $_POST['date_naissance'];
    $mdp = $_POST['password'];
    $checkMdp = $_POST['confirm_password'];

    if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($dateNaissance) && !empty($mdp) && !empty($checkMdp)) {
        if ($mdp == $checkMdp) {
            if ($mail == "admin@gamenexus.com") {
                addAdmin($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp);
            } else {
                addMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp);
            }
        } else {
            echo "Les mots de passe ne correspondent pas.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

function updateMembreMiddleware($bdd)
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['email'];
    $dateNaissance = $_POST['birth'];
    $id = $_POST['id'];

    if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($dateNaissance) && !empty($id)) {
        updateMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $id);
    } else {
        echo "Veuillez remplir tous les champs.";
    }

}

function deleteMembreMiddleware($bdd)
{
    $id = $_POST['id'];

    deleteMembre($bdd, $id);
}