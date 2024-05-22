<?php

function addJeu($bdd, $nom, $description, $quantite, $prix)
{
    $newJeux = $bdd->prepare("INSERT INTO jeux(nom, description, quantité, prix) VALUES (?, ?, ?, ?)");
    $newJeux->execute([$nom, $description, $quantite, $prix]);
}

function addImage($bdd) {
    $requete = $bdd->query("SELECT id FROM jeux ORDER BY id DESC LIMIT 1");

    if ($requete) {
        $resultat = $requete->fetch();
        if ($resultat && isset($resultat[0])) {
            $id = $resultat[0]; // Extraire l'ID

            $chemin = "../../../Front/Image/Jeu/";
            $image = "jeu" . $id . ".jpg";
            $file = $chemin . $image;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $contenu = file_get_contents($_FILES['image']['tmp_name']);

                file_put_contents($file, $contenu);
            } else {
                echo "Erreur lors du téléchargement de l'image.";
            }
        } else {
            echo "Aucun ID trouvé.";
        }
    } else {
        echo "Erreur lors de la requête SQL.";
    }
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

function getJeux($bdd)
{
    $jeux = $bdd->query("SELECT * FROM jeux");

    while ($row = $jeux->fetch(PDO::FETCH_ASSOC)) {
        $noteMoyenne = getNoteMoyenne($row['id'], $bdd);
        echo "<div class='jeu'><h2>". $row['nom'] ."</h2>";
        echo "<div class='crud'><button id='showModifier". $row['id'] ."'><img src='../../../Front/Image/bouton-modifier.png'></button>";
        echo "<button id='showSupprimer". $row['id'] ."'><img src='../../../Front/Image/supprimer.png'></button></div>";
        echo "<div class='precision'><h3>Quantité : ". $row['quantité'] ."</h3>";
        echo "<h3>Prix : ". $row['prix'] ."€</h3>";
        echo "<h3>Note moyenne : " . ($noteMoyenne != 0 ? htmlspecialchars($noteMoyenne) . "/5" : "aucune note") . "</h3>";
        echo "<p>". $row['description'] ."</p></div>";
        dialogModifier($row['nom'], $row['quantité'], $row['prix'], $row['code_activation'], $row['description'], $row['id']);
        dialogSupprimer($row['nom'], $row['id']);
    }
}

function dialogSupprimer($nom, $id)
{
    echo "<dialog id='supDialog". $id . "' style='color: #CA7AD0FF;'>
              <form action='' method='post'>
                  <button onclick='closeSupDialog()'>
                      <img src='../../../Front/Image/fermer.png'>
                  </button>
                  <h4>Voulez-vous supprimer le jeu " . $nom ." ?</h4>
                  <input type='hidden' name='id' value='". $id ."'>
                <input type='submit' name='supprimer' value='Supprimer'>
              </form>
          </dialog>";
}

function dialogModifier($nom, $quantite, $prix, $code, $description, $id)
{
    echo  "<dialog id='modDialog". $id ."' style='color: #e2b946;'>
              <form action='' method='post'>
                  <button onclick='closeModDialog()'>
                      <img src='../../../Front/Image/fermer.png'>
                  </button>
                  <h4>Modifier le jeu ". $nom ."</h4>
                  <input type='hidden' name='id' value='". $id ."'>
                  <label><b>Nom :</b></label></br>
                  <input type='text' name='nom' value='". $nom ."'></br>
                  <label><b>Quantité :</b></label></br>
                  <input type='number' name='quantite' value='". $quantite ."'></br>
                  <label><b>Prix :</b></label></br>
                  <input type='number' name='prix' value='". $prix ."'></br>
                  <label><b>Code d'Activation :</b></label></br>
                  <input type='number' name='code' value='". $code ."'></br>
                  <label><b>Description :</b></label></br>
                  <textarea name='description' rows='8' cols='90'>".htmlspecialchars($description, ENT_QUOTES)."</textarea>
                <input type='submit' name='modifier' value='Enregistrer'>
              </form>
          </dialog>";
}

function getNomJeu($id, $bdd)
{
    $nom = $bdd->prepare("SELECT nom FROM jeux WHERE id=?");
    $nom->execute([$id]);
    return $nom->fetchColumn();
}

function getDescription($id, $bdd)
{
    $description = $bdd->prepare("SELECT description FROM jeux WHERE id=?");
    $description->execute([$id]);
    return $description->fetchColumn();
}

function getQuantite($id, $bdd)
{
    $quantite = $bdd->prepare("SELECT quantité FROM jeux WHERE id=?");
    $quantite->execute([$id]);
    return $quantite->fetchColumn();
}

function getPrix($id, $bdd)
{
    $prix = $bdd->prepare("SELECT prix FROM jeux WHERE id=?");
    $prix->execute([$id]);
    return $prix->fetchColumn();
}

function getNoteMoyenne($id, $bdd) : float
{
    $avis = $bdd->prepare("SELECT note FROM jeux LEFT JOIN avis ON jeux.id = avis.id_jeu WHERE jeux.id= ?");
    $avis->execute([$id]);

    $total = 0;
    $count = 0;

    while ($avi = $avis->fetch(PDO::FETCH_ASSOC)) {
        $count ++;
        $total += $avi['note'];
    }

    if ($count == 0) {
        return  0;
    }

    return round($total/$count, 1);
}
