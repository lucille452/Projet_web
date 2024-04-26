<?php

function addMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp) {
    $newMembre = $bdd->prepare("INSERT INTO membres(nom, prenom, adresse_mail, date_naissance, mot_de_passe) VALUES (?,?,?,?,?) ");
    $newMembre->execute([$nom, $prenom, $mail, $dateNaissance, $mdp]);

    header("Location: accueil_membre.php");
}

function deleteMembre($bdd, $id) {
    $delete = $bdd->prepare("DELETE FROM membres WHERE id=?");
    $delete->execute([$id]);
}

function addAdmin($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp) {
    $newAdmin = $bdd->prepare("INSERT INTO admin(nom, prenom, adresse_mail, date_naissance, mot_de_passe) VALUES (?,?,?,?,?) ");
    $newAdmin->execute([$nom, $prenom, $mail, $dateNaissance, $mdp]);

    header("Location: accueil_membre.php");
}

function getMembres($bdd)
{
    $membres =  $bdd->query("SELECT * FROM membres");

    while ($row = $membres->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>". $row['nom'] ."</td>";
        echo "<td>". $row['prenom'] ."</td>";
        echo "<td>". $row['adresse_mail'] ."</td>";
        echo "<td>". $row['date_naissance'] ."</td>";
        echo "<td>". $row['solde'] ."</td>";
        echo "<td><button id='showModifier". $row['id'] ."'><img src='../../../Front/Image/bouton-modifier.png'></button>";
        echo "<button id='showSupprimer". $row['id'] ."'><img src='../../../Front/Image/supprimer.png'></button></td></tr>";
    }
}