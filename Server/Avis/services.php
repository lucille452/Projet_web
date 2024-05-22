<?php

function addAvis($bdd, $note, $description, $idJeu, $idMembre) {
    $newAvis = $bdd->prepare("INSERT INTO avis(note, description, id_jeu, id_membre) VALUES (?, ?, ?, ?) ");
    $newAvis->execute([$note, $description, $idJeu, $idMembre]);

    header("Location: ../Member_page/jeu.php?id=${idJeu}");
}

function updateAvis($bdd, $note, $description, $id) {
    $update = $bdd->prepare("UPDATE avis SET note=?, description=? WHERE id=?");
    $update->execute([$note, $description, $id]);

//    header("Location: ../Member_page/jeu.php");
}

function deleteAvis($bdd, $id) {
    $delete = $bdd->prepare("DELETE FROM avis WHERE id=?");
    $delete->execute([$id]);

//    header("Location: ../Member_page/jeu.php");
}
