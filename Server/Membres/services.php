<?php

function addMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp) {
    $newMembre = $bdd->prepare("INSERT INTO membres(nom, prenom, adresse_mail, date_naissance, mot_de_passe) VALUES (?,?,?,?,?) ");
    $newMembre->execute([$nom, $prenom, $mail, $dateNaissance, $mdp]);

    header("Location: accueil.php");
}

function deleteMembre($bdd, $id) {
    $delete = $bdd->prepare("DELETE FROM membres WHERE id=?");
    $delete->execute([$id]);
}
