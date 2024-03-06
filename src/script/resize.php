<?php

function resize()
{
    $fichier = "default.jpg";

    $image = "public/images/script/$fichier";
    
    // On récupére les infos de l'image
    $infos = getimagesize($image);
    
    $largeur = $infos[0];
    $hauteur = $infos[1]; 
    
    // On créer une nouvelle image "vierge" en mémoire
    $nouvelleImage = imagecreatetruecolor($largeur / 2, $hauteur / 2);
    
    switch ($infos["mime"])
    {
        case "image/png":
            // On ouvre l'image
            $imageSource = imagecreatefrompng($image);
            break;
    
        case "image/jpeg":
            // On ouvre l'image
            $imageSource = imagecreatefromjpeg($image);
            break;
        
        default:
            die("Format d'image incorrect");
    }
    
    // On copie toute l'image source dans l'image destination en la réduisant
    imagecopyresampled(
        $nouvelleImage, // Image de destination
        $imageSource, // Image de départ
        0, // Position en x du coin supérieur gauche dans l'image de destination
        0, // Position en y du coin supérieur gauche dans l'image de destination
        0, // Position en x du coin supérieur gauche dans l'image source
        0, // Position en y du coin supérieur gauche dans l'image source
        $largeur / 2, // Largeur dans l'image de destination
        $hauteur / 2, // Hauteur dans l'image de destination
        $largeur, // Largeur dans l'image source
        $hauteur // Hauteur dans l'image source
    );
    
    // On enregistre la nouvelle image sur le serveur
    
    switch ($infos["mime"])
    {
        case "image/png":
            // On enregistre l'image
            imagepng($nouvelleImage, "public/images/script/resize-".$fichier);
            break;
    
        case "image/jpeg":
            // On ouvre l'image
            imagejpeg($nouvelleImage, "public/images/script/resize-".$fichier);
            break;
    }
    
    // On détruit les images dans la mémoire
    imagedestroy($imageSource);
    imagedestroy($nouvelleImage);
}
