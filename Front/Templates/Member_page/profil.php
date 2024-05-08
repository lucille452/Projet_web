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
            <h2>About</h2>
            <p>
                Nous sommes l'entreprise de restauration Restôt,
                nous avons lancé un site web pour les commandes en ligne après une campagne réussie.
                Une base de données relationnelle a été mise en place pour optimiser la gestion des commandes,
                menus et clients, renforçant ainsi la position de Restôt sur le marché.
            </p>
        </div>

        <div class="footer-category">
            <h2>What you can discover</h2>

            <ul>
                <li>Biryani</li>
                <li>Chicken</li>
                <li>Pizza</li>
                <li>Burger</li>
                <li>Pasta</li>
            </ul>
        </div>

        <div class="get-in-touch">
            <h2>Get in touch</h2>
            <ul>
                <li>Account</li>
                <li>Support Center</li>
                <li>Feedback</li>
                <li>Suggestion</li>
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
