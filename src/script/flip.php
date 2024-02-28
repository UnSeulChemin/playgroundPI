<?php

function flip()
{
    $fichier = "a.jpg";
    
    $image = "public/images/uploads/$fichier";
    
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
            imagepng($imageSource, "public/images/uploads/flip-".$fichier);
            break;
    
        case "image/jpeg":
            // On ouvre l'image
            imagejpeg($imageSource, "public/images/uploads/flip-".$fichier);
            break;
    }
    
    // On détruit les images dans la mémoire
    imagedestroy($imageSource);    
}