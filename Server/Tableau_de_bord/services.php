<?php

function addVentes($bdd, $ventes)
{
    $addVentes = $bdd->prepare("UPDATE tableau_de_bord SET ventes_totales = ventes_totales + ?");
    $addVentes->execute([$ventes]);
}

function addRevenus($bdd, $revenus)
{
    $addRevenu = $bdd->prepare("UPDATE tableau_de_bord SET revenu_totaux = revenu_totaux + ?");
    $addRevenu->execute([$revenus]);
}