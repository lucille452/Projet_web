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
    $revenuTotaux = $bdd->query("SELECT revenu_totaux FROM tableau_de_bord");
    $data = $revenuTotaux->fetchColumn();

    echo "<h2 class='h2'>".$data."&nbsp;€</h2>";
}

function getVentesTotales($bdd)
{
    $ventesTotales = $bdd->query("SELECT ventes_totales FROM tableau_de_bord");
    $data = $ventesTotales->fetchColumn();

    echo "<h2 class='h2'>".$data."</h2>";
}

function getRevenus7jours($bdd)
{
    $revenuTotaux = $bdd->query("SELECT revenu_totaux FROM tableau_de_bord");
    $data = $revenuTotaux->fetchColumn();

    echo "<h2 class='h2'>". $data/2 ."&nbsp;€</h2>";

}