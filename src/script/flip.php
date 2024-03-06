<?php

function flip()
{
    $fichier = "default.jpg";
    
    $image = "public/images/script/$fichier";
    
    // On récupére les infos de l'image
    $infos = getimagesize($image);
    
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
    
    // On retourne l'image
    imageflip($imageSource, IMG_FLIP_BOTH);
    
    switch ($infos["mime"])
    {
        case "image/png":
            // On enregistre l'image
            imagepng($imageSource, "public/images/script/flip-".$fichier);
            break;
    
        case "image/jpeg":
            // On ouvre l'image
            imagejpeg($imageSource, "public/images/script/flip-".$fichier);
            break;
    }
    
    // On détruit les images dans la mémoire
    imagedestroy($imageSource);    
}