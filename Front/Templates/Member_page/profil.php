<?php
include "../../../Server/Pages/profil.php";

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Css/profil.css" />
    <link rel="stylesheet" href="../../Css/Structure/dialog.css" />
    <script src="../../Js/profil.js"></script>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="accueil_membre.php"><img src="../../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
                <li><a href="accueil_membre.php">Accueil</a></li>
                <li><a href="panier.php">Panier</a></li>
                <li><a href="profil.php" class="active">Profil</a></li>
                <li><a href="../Global_page/connexion.php">Déconnexion</a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
    <section class="section">
        <div class="container">
            <h1>Profil</h1>
            <div class="profile-info">
                <!-- Informations utilisateur -->
                <?php if(isset($_SESSION['mail'])): ?>
                    <?php
                    // Récupération des données utilisateur depuis la session
                    $mail = $_SESSION['mail'];
                    $mdp = $_SESSION['mdp'];

                    $user = $bdd->prepare("SELECT * FROM membres WHERE adresse_mail=? AND mot_de_passe=?");
                    $user->execute([$mail, $mdp]);

                    // Utilisation de fetch pour obtenir les données de l'utilisateur
                    $userData = $user->fetch();
                    ?>
                    <p class="info-item">Nom: <span id="nom"><?php echo isset($userData['nom']) ? $userData['nom'] : 'Nom de l\'utilisateur'; ?></span></p>
                    <p class="info-item">Prénom: <span id="prenom"><?php echo isset($userData['prenom']) ? $userData['prenom'] : 'Prénom de l\'utilisateur'; ?></span></p>
                    <p class="info-item">Adresse email: <span id="email"><?php echo isset($userData['adresse_mail']) ? $userData['adresse_mail'] : 'Email de l\'utilisateur'; ?></span></p>
                    <p class="info-item">Date de naissance: <span id="dob"><?php echo isset($userData['date_naissance']) ? $userData['date_naissance'] : 'Date de naissance de l\'utilisateur'; ?></span></p>
                    <p class="info-item">Solde: <span id="solde"><?php echo isset($userData['solde']) ? $userData['solde'] : '0'; ?></span> €</p> <!-- Ajout du solde -->
                <?php endif; ?>
            </div>
            <div class="button-container">
                <!-- Boutons pour ajouter au solde -->
                <form action="" method="post">
                    <button name="addAmount" value="10">+10 €</button>
                    <button name="addAmount" value="20">+20 €</button>
                    <button name="addAmount" value="50">+50 €</button>
                    <button name="addAmount" value="100">+100 €</button>
                </form>
            </div>
            <button id="btnModifier"><img src="../../Image/bouton-modifier.png" > Modifier</button>
            <button id="btnSupprimer"><img src="../../Image/supprimer.png" > Supprimer</button>
            <dialog id='supDialog' style='color: #CA7AD0FF;'>
                <form action='' method='post'>
                    <button onclick='closeSup2()'>
                        <img src='../../Image/fermer.png'>
                    </button>
                    <h4>Voulez-vous supprimer votre compte ?</h4>
                    <input type='hidden' name='id' value='<?php echo isset($userData['id']) ? $userData['id'] : '0';?>'>
                    <input type='submit' name='supprimer' value='Supprimer'>
                </form>
            </dialog>
        </div>
    </section>

    <!-- Inputs pour la modification des informations -->
    <section id="sectionModifier" class="section" style="display: none;">
        <div class="container">
            <h2>Modifier vos informations</h2>
            <form id="formModifier" action="" method="post">
                <label for="newNom">Nouveau nom:</label>
                <input type="text" id="newNom" name="nom" value="<?php echo isset($userData['nom']) ? $userData['nom'] : ''; ?>"><br><br>

                <label for="newPrenom">Nouveau prénom:</label>
                <input type="text" id="newPrenom" name="prenom" value="<?php echo isset($userData['prenom']) ? $userData['prenom'] : ''; ?>"><br><br>

                <label for="newEmail">Nouvelle adresse email:</label>
                <input type="email" id="newEmail" name="email" value="<?php echo isset($userData['adresse_mail']) ? $userData['adresse_mail'] : ''; ?>"><br><br>

                <label for="newDOB">Nouvelle date de naissance:</label>
                <input type="date" id="newDOB" name="birth" value="<?php echo isset($userData['date_naissance']) ? $userData['date_naissance'] : ''; ?>"><br><br>

                <input type="hidden" name="id" value="<?php echo isset($userData['id']) ? $userData['id'] : ''; ?>">

                <div class="button-container">
                    <input type="submit" name="enregistrer" value="Enregistrer">
                    <button id="btnRetour">Retour</button>
                </div>
            </form>
        </div>
    </section>
</main>

<!-- Footer -->
<footer>
    <div class="container flex">
        <div class="footer-about">
            <h2>À propos</h2>
            <p>
                Game Nexus, fondée en 2022, est une entreprise dynamique spécialisée dans la vente de jeux vidéo en ligne.
                Nous proposons un catalogue diversifié, régulièrement mis à jour avec les dernières nouveautés et les classiques
                du jeu vidéo, en collaboration avec les plus grands éditeurs. Notre mission est de fournir une plateforme fiable
                et accessible pour découvrir, acheter et télécharger des jeux, tout en créant une communauté dynamique de joueurs.
                Nous aspirons à devenir la référence mondiale en offrant une expérience utilisateur exceptionnelle, des promotions
                exclusives et un support client de qualité.
            </p>
        </div>

        <div class="footer-category">
            <h2>Services</h2>

            <ul>
                <li>Téléchargement immédiat</li>
                <li>Offres promotionnelles</li>
                <li>Avis et recommandations</li>
                <li>Communauté</li>
                <li>Support client</li>
            </ul>
        </div>

        <div class="get-in-touch">
            <h2>Valeurs</h2>
            <ul>
                <li>Passion pour le jeu</li>
                <li>Innovation</li>
                <li>Intégrité</li>
                <li>Communauté</li>
            </ul>
        </div>
    </div>

    <div class="copyright">
        <p>Copyright &copy; 2024. All Rights Reserved.</p>
    </div>
</footer>
<!-- End Footer -->
</body>
</html>
