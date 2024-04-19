<?php

function addJeu($bdd, $nom, $description, $quantite, $prix)
{
    $codeActivation = genererCodeActivation();
    $newJeux = $bdd->prepare("INSERT INTO jeux(nom, description, quantité, prix, code_activation) VALUES (?, ?, ?, ?, ?)");
    $newJeux->execute([$nom, $description, $quantite, $prix, $codeActivation]);
}

function deleteJeu($bdd, $id)
{
    $deleteJeux = $bdd->prepare("DELETE FROM jeux WHERE id=?");
    $deleteJeux->execute([$id]);
}

function genererCodeActivation() {
    // Génère un nombre aléatoire entre 100000 et 999999 inclusivement
    return rand(100000, 999999);
}