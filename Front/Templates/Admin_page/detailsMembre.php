<?php
include '../../../Server/Pages/detailsMembre.php';
$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Détails</title>
    <link rel="stylesheet" href="../../Css/Structure/base.css"/>
    <link rel="stylesheet" href="../../Css/Structure/header.css"/>
    <link rel="stylesheet" href="../../Css/Admin/detailsMembre.css">
    <link rel="shortcut icon" type="image/png" href="../../Image/logo.png"/>
</head>
<body>
<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>
<header>
        <nav>
            <ul>
                <li><a href="accueil_admin.php"><img src="../../Image/logo.png"></a><p>GameNexus</p></li>
            </ul>
        </nav>
</header>

<main>
    <nav id="chemin">
        <ul>
            <li><a href="membres.php">Tous les membres ></a></li>
            <li><a href="#">&nbsp;Détails du membre <?php echo getNom($id, $bdd)?></a></li>
        </ul>
    </nav>

    <article>
        <?php
        showDetailsMembres($bdd);
        ?>
    </article>

</main>

</body>
</html>
