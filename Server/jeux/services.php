<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8;','root',"");


function AddJeux($bdd, $nom, $description, $quantite, $prix, $codeActivation)
{
    $newJeux = $bdd->prepare("INSERT INTO jeux(nom, description, quantité, prix, code_activation) VALUES (?, ?, ?, ?, ?)");
    $newJeux->execute([$nom, $description, $quantite, $prix, $codeActivation]);
}

function DeleteJeux($bdd, $id)
{
    $deleteJeux = $bdd->prepare("DELETE FROM jeux WHERE id=?");
    $deleteJeux->execute([$id]);
}