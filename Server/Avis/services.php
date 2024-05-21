<?php

function addAvis($bdd, $note, $description) {
    $newAvis = $bdd->prepare("INSERT INTO avis(note, description) VALUES (?,?) ");
    $newAvis->execute([$note, $description]);

    header("Location: ../Member_page/jeu.php");
}

function updateAvis($bdd, $note, $description, $id) {
    $update = $bdd->prepare("UPDATE avis SET note=?, description=? WHERE id=?");
    $update->execute([$note, $description, $id]);

    header("Location: ../Member_page/jeu.php");
}

function deleteAvis($bdd, $id) {
    $delete = $bdd->prepare("DELETE FROM avis WHERE id=?");
    $delete->execute([$id]);

    header("Location: ../Member_page/jeu.php");
}
?>