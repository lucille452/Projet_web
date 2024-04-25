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
                <p class="info-item">Nom: <span id="nom">Nom de l'utilisateur</span></p>
                <p class="info-item">Prénom: <span id="prenom">Prénom de l'utilisateur</span></p>
                <p class="info-item">Adresse email: <span id="email">Email de l'utilisateur</span></p>
                <p class="info-item">Date de naissance: <span id="dob">Date de naissance de l'utilisateur</span></p>
                <p class="info-item">Solde: <span id="solde">0</span> €</p> <!-- Ajout du solde -->
            </div>
            <div class="button-container">
                <!-- Boutons de recharge avec confirmation -->
                <button onclick="rechargerSolde(10)">+10 €</button>
                <button onclick="rechargerSolde(20)">+20 €</button>
                <button onclick="rechargerSolde(50)">+50 €</button>
                <button onclick="rechargerSolde(100)">+100 €</button>
            </div>
            <button id="btnModifier"><img src="../../Image/bouton-modifier.png" > Modifier</button>
        </div>
    </section>

    <!-- Inputs pour la modification des informations -->
    <section id="sectionModifier" class="section" style="display: none;">
        <div class="container">
            <h2>Modifier vos informations</h2>
            <form id="formModifier">
                <label for="newNom">Nouveau nom:</label>
                <input type="text" id="newNom" name="newNom"><br><br>

                <label for="newPrenom">Nouveau prénom:</label>
                <input type="text" id="newPrenom" name="newPrenom"><br><br>

                <label for="newEmail">Nouvelle adresse email:</label>
                <input type="email" id="newEmail" name="newEmail"><br><br>

                <label for="newDOB">Nouvelle date de naissance:</label>
                <input type="date" id="newDOB" name="newDOB"><br><br>

                <label for="newPassword">Nouveau mot de passe:</label>
                <input type="password" id="newPassword" name="newPassword"><br><br>

                <label for="confirmPassword">Confirmez le nouveau mot de passe:</label>
                <input type="password" id="confirmPassword" name="confirmPassword"><br><br>

                <div class="button-container">
                    <input type="submit" value="Enregistrer">
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
