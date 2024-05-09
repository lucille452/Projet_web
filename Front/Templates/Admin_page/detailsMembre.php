<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Détails</title>
    <link rel="shortcut icon" type="image/png" href="../../Image/logo.png"/>
</head>
<body>

<?php
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    echo $id;
?>

</body>
</html>
