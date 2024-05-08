<?php
include 'middlewares.php';

function addMembreController($bdd)
{
    if (isset($_POST['submit'])) {
        addMembreMiddleware($bdd);
    }
}

function updateMembreControllerAdmin($bdd)
{
    if (isset($_POST['modifier'])) {
    updateMembreMiddlewareAdmin($bdd);
    }
}

function updateMembreController($bdd)
{
    if (isset($_POST['enregistrer'])) {
    updateMembreMiddleware($bdd);
    }
}

function deleteMembreController($bdd)
{
    if (isset($_POST['supprimer'])) {
        deleteMembreMiddleware($bdd);
    }
}