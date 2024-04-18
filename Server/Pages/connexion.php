<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

if (isset($_POST["submit"])) {
    $mail = $_POST["email"];
    $mdp = $_POST["password"];

    $user = $bdd->prepare("SELECT * FROM membres WHERE adresse_mail=? AND mot_de_passe=?");
    $user->execute([$mail, $mdp]);

    // Utilisation de fetch pour obtenir les données de l'utilisateur
    $userData = $user->fetch();

    // Vérification si l'utilisateur existe
    if ($userData) {
        // Vérification du type d'utilisateur
        if ($mail != "admin@gamenexus.com") {
            session_start();
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $mdp;
            header("Location: accueil_membre.php");
            exit(); // Terminer le script après la redirection
        } else {
            header("Location: accueil_admin.php");
            exit(); // Terminer le script après la redirection
        }
    } else {
        echo 'Utilisateur introuvable';
    }
}
