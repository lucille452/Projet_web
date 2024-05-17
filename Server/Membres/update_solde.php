<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

// Fonction pour récupérer les données de l'utilisateur par email
function getUserDataByEmail($bdd, $email) {
    $user = $bdd->prepare("SELECT * FROM membres WHERE adresse_mail=?");
    $user->execute([$email]);
    return $user->fetch(PDO::FETCH_ASSOC);
}

// Fonction pour mettre à jour le solde de l'utilisateur
function updateSolde($bdd, $email, $newSolde) {
    $updateSolde = $bdd->prepare("UPDATE membres SET solde=? WHERE adresse_mail=?");
    $updateSolde->execute([$newSolde, $email]);
}

if(isset($_POST['addAmount'])) {
    $amount = intval($_POST['addAmount']);

    if($amount > 0) {
        if(isset($_SESSION['mail'])) {
            $mail = $_SESSION['mail'];
            $userData = getUserDataByEmail($bdd, $mail);

            if($userData) {
                $currentSolde = intval($userData['solde']);
                $newSolde = $currentSolde + $amount;

                updateSolde($bdd, $mail, $newSolde);

                // Redirection vers la page du profil
                header("Location: profil.php");
                exit();
            }
        }
    }
}


function updateSoldePaid($bdd, $prix)
{
    $paid = $bdd->prepare("UPDATE membres SET solde = solde - ? WHERE id=?");
    $paid->execute([$prix, getIdMembre($bdd)]);
}

function getSolde($bdd)
{
    $solde = $bdd->prepare("SELECT solde FROM membres WHERE id=?");
    $solde->execute([getIdMembre($bdd)]);
    return $solde->fetchColumn();
}