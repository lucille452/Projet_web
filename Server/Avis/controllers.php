<?php
include 'middlewares.php';

function addAvisController($bdd)
{
    if (isset($_POST['addComment'])) {
        addAvisMiddleware($bdd);
    }
}


function updateAvisController($bdd)
{
    if (isset($_POST['modifier'])) {
        updateAvisMiddleware($bdd);
    }
}


function deleteAvisController($bdd)
{
    if (isset($_POST['supprimer'])) {
        deleteAvisMiddleware($bdd);
    }
}