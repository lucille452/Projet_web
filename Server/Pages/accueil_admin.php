<?php

function getNbrMembres($bdd)
{
    $membres = $bdd->query("SELECT COUNT(*) AS count FROM membres");
    if ($membres) {
        $data = $membres->fetch(); // Récupère la première ligne du résultat
        $nbrMembres = $data['count']; // Récupère le nombre total de membres
    } else {
        $nbrMembres = 0; // En cas d'erreur de requête, on retourne 0
    }

    echo "<div><h2>$nbrMembres</h2></div>";
}

function getRevenuTotaux($bdd)
{

}

function getVentesTotales($bdd)
{

}

function getRevenus7jours($bdd)
{

}