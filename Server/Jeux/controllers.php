<?php
include 'middlewares.php';

function addJeuController($bdd)
{
    if (isset($_POST['submit']) && isset($_FILES['image'])) {
        addJeuMiddleware($bdd);
    }
}


function updateJeuController($bdd)
{
    if (isset($_POST['modifier'])) {
        updateJeuMiddleware($bdd);
    }
}


function deleteJeuController($bdd)
{
    if (isset($_POST['supprimer'])) {
        deleteJeuMiddleware($bdd);
    }
}