<?php

include '/xampp/htdocs/Projet_web/Server/Membres/controllers.php';
include '/xampp/htdocs/Projet_web/Server/Membres/update_solde.php';

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8;', 'root', "");

updateMembreController($bdd);
