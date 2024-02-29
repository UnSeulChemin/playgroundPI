<?php

$clients = [
    0 => [
        "nom" => "Gambier",
        "prenom" => "Benoit"
    ],
    1 => [
        "nom" => "César",
        "prenom" => "Jules"
    ]
];

for ($nombre = 0; $nombre < sizeof($clients); $nombre++)
{
    var_dump($clients[$nombre]);
}

// Savoir combien de ligne on été supprimés
echo $requete->rowCount();

// '; --  
// OR 1=1; --  
