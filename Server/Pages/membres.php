<?php

function getMembres($bdd)
{
    $membres =  $bdd->query("SELECT * FROM membres");

    while ($row = $membres->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>". $row['nom'] ."</td>";
        echo "<td>". $row['prenom'] ."</td>";
        echo "<td>". $row['adresse_mail'] ."</td>";
        echo "<td>". $row['date_naissance'] ."</td>";
        echo "<td>". $row['solde'] ."</td></tr>";
    }
}
