<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Facture</title>
</head>
<body>

<h1>Facture</h1>

<table>
    <thead>
        <tr>
            <th scope="col">Qté</th>
            <th scope="col">Jeu</th>
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
<p>Total <h2><?php echo getTotalPrix($bdd)."€"; ?></h2></p>
<hr>

<div>
    <h2></h2>
</div>

</body>
</html>