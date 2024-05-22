<?php
include 'services.php';

function addAvisMiddleware($bdd) {
    $note = $_POST['note'];
    $description = $_POST['description'];
    $idJeu = $_POST['idJeu'];

    if (!empty($note) && !empty($description)) {
        addAvis($bdd, $note, $description, $idJeu, getIdMembre($bdd));
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

function updateAvisMiddleware($bdd) {
    $note = $_POST['note'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    if (!empty($note) && !empty($description) && !empty($id)) {
        updateAvis($bdd, $note, $description, $id);
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

function deleteAvisMiddleware($bdd) {
    $id = $_POST['id'];

    deleteAvis($bdd, $id);
}
?>