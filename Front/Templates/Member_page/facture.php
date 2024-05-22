<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Facture</title>
</head>
<style>
    /* Style pour le tableau */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }

    /* Style pour les en-têtes de colonnes */
    th {
        background-color: #f2f2f2;
        padding: 12px 15px;
        text-align: left;
        border-bottom: 2px solid #ddd;
    }

    /* Style pour les cellules */
    td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    /* Optionnel : Style pour les lignes impaires */
    tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    /* Optionnel : Style pour les lignes au survol */
    tr:hover {
        background-color: #f1f1f1;
    }

</style>
<body>

<h1>Facture</h1>

<hr>

<table>
    <thead>
        <tr>
            <th scope="col">Jeu</th>
            <th scope="col">Code d'Activation</th>
            <th scope="col">Qté</th>
            <th scope="col">Prix</th>
        </tr>
    </thead>
    <tbody>
    <?php
    getArticlesFacture($bdd);
    ?>
    </tbody>
</table>

<hr>

    <p>Total</p>
    <h2><?php echo getTotalPrix($bdd)."€"; ?></h2>

<hr>

<div>
    <h2></h2>
</div>

</body>
</html>