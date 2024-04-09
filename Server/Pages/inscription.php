<?php
include "../Membres/controllers.php";

$bdd = new PDO('mysql:host=localhost;dbname=projet_dev;charset=utf8;','root',"");

addMembreController($bdd);

