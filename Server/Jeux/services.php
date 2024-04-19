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

function getJeux($bdd)
{
    $jeux = $bdd->query("SELECT * FROM jeux");

    while ($row = $jeux->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='jeu'><h2>". $row['nom'] ."</h2>";
        echo "<div><h3>Quantité : ". $row['quantité'] ."</h3>";
        echo "<h3>Prix : ". $row['prix'] ."€</h3>";
        echo "<h3>Code d'Activation : ". $row['code_activation'] ."</h3></div>";
        echo "<p>". $row['description'] ."</p></div>";
    }
}