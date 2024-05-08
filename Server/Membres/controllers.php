<?php
include 'middlewares.php';

function addMembreController($bdd)
{
    if (isset($_POST['submit'])) {
        addMembreMiddleware($bdd);
    }
}

function updateMembreController($bdd)
{
    if (isset($_POST['modifier'])) {
        updateMembreMiddleware($bdd);
    }
}

function deleteMembreController($bdd)
{
    if (isset($_POST['supprimer'])) {
        deleteMembreMiddleware($bdd);
    }
}