<?php
@include '/xampp/htdocs/Projet_web/Server/Jeux/controllers.php';

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8','root','');

addJeuController($bdd);

deleteJeuController($bdd);
