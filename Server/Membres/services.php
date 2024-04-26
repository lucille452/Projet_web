<?php

function addMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp) {
    $newMembre = $bdd->prepare("INSERT INTO membres(nom, prenom, adresse_mail, date_naissance, mot_de_passe) VALUES (?,?,?,?,?) ");
    $newMembre->execute([$nom, $prenom, $mail, $dateNaissance, $mdp]);

    header("Location: ../Member_page/accueil_membre.php");
}

function deleteMembre($bdd, $id) {
    $delete = $bdd->prepare("DELETE FROM membres WHERE id=?");
    $delete->execute([$id]);
}

function addAdmin($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp) {
    $newAdmin = $bdd->prepare("INSERT INTO admin(nom, prenom, adresse_mail, date_naissance, mot_de_passe) VALUES (?,?,?,?,?) ");
    $newAdmin->execute([$nom, $prenom, $mail, $dateNaissance, $mdp]);

    header("Location: ../Admin_page/accueil_admin.php");
}