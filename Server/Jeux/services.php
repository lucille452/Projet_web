<?php

function addJeu($bdd, $nom, $description, $quantite, $prix)
{
    $codeActivation = genererCodeActivation();
    $newJeux = $bdd->prepare("INSERT INTO jeux(nom, description, quantité, prix, code_activation) VALUES (?, ?, ?, ?, ?)");
    $newJeux->execute([$nom, $description, $quantite, $prix, $codeActivation]);
}

function updateJeu($bdd, $nom, $description, $quantite, $prix, $code, $id)
{
    $updateJeu = $bdd->prepare("UPDATE jeux SET nom=?, description=?, quantité=?, prix=?, code_activation=? WHERE id=?");
    $updateJeu->execute([$nom, $description, $quantite, $prix, $code, $id]);
}

function deleteJeu($bdd, $id)
{
    $deleteJeux = $bdd->prepare("DELETE FROM jeux WHERE id=?");
    $deleteJeux->execute([$id]);
}

function genererCodeActivation() {
    // Génère un nombre aléatoire entre 100000 et 999999 inclusivement
    return rand(100000, 999999);
}

function getJeux($bdd)
{
    $jeux = $bdd->query("SELECT * FROM jeux");

    while ($row = $jeux->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='jeu'><h2>". $row['nom'] ."</h2>";
        echo "<div class='crud'><button id='showModifier". $row['id'] ."'><img src='../../Front/Image/bouton-modifier.png'></button>";
        echo "<button id='showSupprimer". $row['id'] ."'><img src='../../Front/Image/supprimer.png'></button></div>";
        echo "<div class='precision'><h3>Quantité : ". $row['quantité'] ."</h3>";
        echo "<h3>Prix : ". $row['prix'] ."€</h3>";
        echo "<h3>Code d'Activation : ". $row['code_activation'] ."</h3></div>";
        echo "<p>". $row['description'] ."</p></div>";
        dialogModifier($row['nom'], $row['quantité'], $row['prix'], $row['code_activation'], $row['description'], $row['id']);
        dialogSupprimer($row['nom'], $row['id']);
    }
}

function dialogSupprimer($nom, $id)
{
    echo "<dialog id='supDialog". $id ."'>
              <form action='' method='post'>
                  <button onclick='closeSupDialog()'>
                      <img src='../../Front/Image/fermer.png'>
                  </button>
                  <h4>Voulez-vous supprimer le jeu ". $nom ." ?</h4>
                  <input type='hidden' name='id' value='". $id ."'>
                <input type='submit' name='supprimer' value='Supprimer'>
              </form>
          </dialog>";
}

function dialogModifier($nom, $quantite, $prix, $code, $description, $id)
{
    echo  "<dialog id='modDialog". $id ."'>
              <form action='' method='post'>
                  <button onclick='closeModDialog()'>
                      <img src='../../Front/Image/fermer.png'>
                  </button>
                  <h4>Modifier le jeu ". $nom ."</h4>
                  <input type='hidden' name='id' value='". $id ."'>
                  <input type='text' name='nom' value='". $nom ."'>
                  <input type='number' name='quantite' value='". $quantite ."'>
                  <input type='number' name='prix' value='". $prix ."'>
                  <input type='number' name='code' value='". $code ."'>
                  <input type='text' name='description' value='". htmlspecialchars($description, ENT_QUOTES) ."'>
                <input type='submit' name='modifier' value='Enregistrer'>
              </form>
          </dialog>";
}