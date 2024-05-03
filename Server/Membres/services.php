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
        echo "<button id='showSupprimer". $row['id'] ."'><img src='../../../Front/Image/supprimer.png'></button></td>";
        echo "<div id='modifier". $row['id'] ."'></div></tr>";
        dialog($row['nom'], $row['id']);
    }
}

function dialog($nom, $id)
{
    echo "<dialog id='supDialog". $id . "' style='color: #CA7AD0FF;'>
              <form action='' method='post'>
                  <button onclick='closeDialog()'>
                      <img src='../../../Front/Image/fermer.png'>
                  </button>
                  <h4>Voulez-vous supprimer le membre " . $nom ." ?</h4>
                  <input type='hidden' name='id' value='". $id ."'>
                <input type='submit' name='supprimer' value='Supprimer'>
              </form>
          </dialog>";
}