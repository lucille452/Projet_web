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
            addMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp);
        } else {
            echo "Les mots de passe ne correspondent pas.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}