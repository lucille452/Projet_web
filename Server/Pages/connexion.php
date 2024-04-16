<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8;','root',"");

if (isset($_POST["submit"])) {
    $mail = $_POST["email"];
    $mdp = $_POST["password"];

    $user = $bdd->prepare("SELECT * FROM membres WHERE adresse_mail=? AND mot_de_passe=?");
    $user->execute([$mail, $mdp]);

    if (!empty($user)) {
        if ($mail != "admin@gamenexus.com") {
            
            header("Location: accueil_membre.php");
        } else {
            header("Location: accueil_admin.php");
        }
    }
}