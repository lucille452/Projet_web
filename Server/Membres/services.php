<?php

function addMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp) {
    $newMembre = $bdd->prepare("INSERT INTO membres(nom, prenom, adresse_mail, date_naissance, mot_de_passe) VALUES (?,?,?,?,?) ");
    $newMembre->execute([$nom, $prenom, $mail, $dateNaissance, $mdp]);

    session_start();
    $_SESSION['mail'] = $mail;
    $_SESSION['mdp'] = $mdp;

    header("Location: ../Member_page/accueil_membre.php");
}

function updateMembreAdmin($bdd, $nom, $prenom, $mail, $dateNaissance, $id) {
    $newMembre = $bdd->prepare("UPDATE membres SET nom=?, prenom=?, adresse_mail=?, date_naissance=? WHERE id=? ");
    $newMembre->execute([$nom, $prenom, $mail, $dateNaissance, $id]);

    header("Location: membres.php");
}

function updateMembre($bdd, $nom, $prenom, $mail, $dateNaissance, $id) {
    $newMembre = $bdd->prepare("UPDATE membres SET nom=?, prenom=?, adresse_mail=?, date_naissance=? WHERE id=? ");
    $newMembre->execute([$nom, $prenom, $mail, $dateNaissance, $id]);

    header("Location: profil.php");
}

function deleteMembre($bdd, $id) {
    $delete = $bdd->prepare("DELETE FROM membres WHERE id=?");
    $delete->execute([$id]);
}

function addAdmin($bdd, $nom, $prenom, $mail, $dateNaissance, $mdp) {
    $newAdmin = $bdd->prepare("INSERT INTO admin(nom, prenom, adresse_mail, date_naissance, mot_de_passe) VALUES (?,?,?,?,?) ");
    $newAdmin->execute([$nom, $prenom, $mail, $dateNaissance, $mdp]);

    header("Location: ../Admin_page/accueil_admin.php");
}

function getMembres($bdd)
{
    $membres =  $bdd->query("SELECT * FROM membres");

    while ($row = $membres->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr data-id='". $row['id'] ."'><td>". $row['nom'] ."</td>";
        echo "<td>". $row['prenom'] ."</td>";
        echo "<td>". $row['adresse_mail'] ."</td>";
        echo "<td>". $row['date_naissance'] ."</td>";
        echo "<td>". $row['solde'] ."</td>";
        echo "<td><button id='showModifier". $row['id'] ."'><img src='../../../Front/Image/bouton-modifier.png'></button>";
        echo "<button id='showSupprimer". $row['id'] ."'><img src='../../../Front/Image/supprimer.png'></button></td></tr>";
        echo "<tr><form action='' method='post' id='modifier". $row['id'] ."'></form></tr>";
        dialogSup($row['nom'], $row['id']);
        dialogMod($row['nom'], $row['prenom'], $row['adresse_mail'], $row['date_naissance'],$row['id']);

    }
}

function dialogSup($nom, $id)
{
    echo "<dialog id='supDialog". $id . "' style='color: #CA7AD0FF;'>
              <form action='' method='post'>
                  <button onclick='closeSup()'>
                      <img src='../../../Front/Image/fermer.png'>
                  </button>
                  <h4>Voulez-vous supprimer le membre " . $nom ." ?</h4>
                  <input type='hidden' name='id' value='". $id ."'>
                <input type='submit' name='supprimer' value='Supprimer'>
              </form>
          </dialog>";
}

function dialogMod($nom, $prenom, $mail, $birth, $id)
{
    echo  "<dialog id='modDialog". $id ."' style='color: #e2b946;'>
              <form action='' method='post'>
                  <button onclick='closeMod()'>
                      <img src='../../../Front/Image/fermer.png'>
                  </button>
                  <h4>Modifier le membre ". $nom ."</h4>
                  <input type='hidden' name='id' value='". $id ."'>
                  <label><b>Nom :</b></label></br>
                  <input type='text' name='nom' value='". $nom ."'></br>
                  <label><b>Prénom :</b></label></br>
                  <input type='text' name='prenom' value='". $prenom ."'></br>
                  <label><b>Adresse mail :</b></label></br>
                  <input type='email' name='email' value='". $mail ."'></br>
                  <label><b>Date de naissance :</b></label></br>
                  <input type='date' name='birth' value='". $birth ."'></br>
                <input type='submit' name='modifier' value='Enregistrer'>
              </form>
          </dialog>";
}

function getNom($id, $bdd)
{
    $nom = $bdd->prepare("SELECT nom FROM membres WHERE id=?");
    $nom->execute([$id]);

    return $nom->fetchColumn();
}

function showDetailsMembres($bdd)
{
    $membres =  $bdd->query("SELECT * FROM membres");

    while ($row = $membres->fetch(PDO::FETCH_ASSOC)) {
        echo "<h1>". $row['nom'] ."</h1>";
        echo "<h2>". $row['prenom'] ."</h2>";
        echo "<div><h3>". $row['adresse_mail'] ."</h3>";
        echo "<h3>Date de naissance : ". $row['date_naissance'] ."</h3>";
        echo "<h3>Solde : ". $row['solde'] ."€</h3></div>";
    }
}