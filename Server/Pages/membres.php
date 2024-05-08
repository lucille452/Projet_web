<?php

include '/xampp/htdocs/Projet_web/Server/Membres/controllers.php';

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8;','root',"");

updateMembreController($bdd);
deleteMembreController($bdd);
