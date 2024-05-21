<?php
include 'middlewares.php';

function addAvisMiddleware($bdd)
{
    if (isset($_POST['submit'])) {
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