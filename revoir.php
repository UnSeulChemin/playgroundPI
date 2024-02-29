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

// POST = pour ajouter des informations en base de données

// Dès qu'il y a un input type file ; enctype="multipart/form-data"> 