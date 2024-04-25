<?php
include "../../Server/Pages/accueil_admin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil - GameNexus</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../Css/accueil_admin.css" />
    <style>

    </style>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="accueil_admin.php"><img src="../../Image/logo.png"></a><p>GameNexus</p></li>
            <div>
                <li><a href="accueil_admin.php" class="active">Accueil</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="../Global_page/connexion.php">Déconnexion</a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
    <section>
        <div class="line">
            <div class="info first">
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');
                getNbrMembres($bdd);
                ?>
                <h3>membres</h3>
            </div>
            <div class="info first">
                <h3>au total</h3>
            </div>
            <div class="info first">
                <img src="../../Image/vente.png">
                <h3>ventes</h3>
            </div>
        </div>
        <div class="line">
            <div class="info second">
                <img src="../../Image/sac-dargent.png">
                <h3>ces 7 derniers jours</h3>
            </div>
            <div class="info second">
                <svg width="400" height="250">
                    <!-- Barres du graphique -->
                    <rect x="50" y="200" width="40" height="100" fill="#00484f" />
                    <rect x="100" y="150" width="40" height="150" fill="#00484f" />
                    <rect x="150" y="180" width="40" height="120" fill="#00484f" />
                    <rect x="200" y="170" width="40" height="200" fill="#00484f" />
                    <rect x="250" y="140" width="40" height="200" fill="#00484f" />
                    <rect x="300" y="190" width="40" height="200" fill="#00484f" />
                    <rect x="350" y="100" width="40" height="200" fill="#00484f" />

                    <!-- Ajouter des chiffres au-dessus des barres -->
                    <text x="70" y="190" font-size="12" text-anchor="middle">15</text>
                    <text x="120" y="140" font-size="12" text-anchor="middle">20</text>
                    <text x="170" y="170" font-size="12" text-anchor="middle">17</text>
                    <text x="220" y="160" font-size="12" text-anchor="middle">22</text>
                    <text x="270" y="130" font-size="12" text-anchor="middle">22</text>
                    <text x="320" y="180" font-size="12" text-anchor="middle">22</text>
                    <text x="370" y="90" font-size="12" text-anchor="middle">22</text>
                </svg>
                <h3>ventes ces 7 derniers jours</h3>
            </div>
        </div>
    </section>
</main>

</body>
</html>