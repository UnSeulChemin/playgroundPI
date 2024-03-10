<?php

function rotate()
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
    
    // On tourne l'image
    $nouvelleImage = imagerotate($imageSource, 90, 0);
    
    switch ($infos["mime"])
    {
        case "image/png":
            // On enregistre l'image
            imagepng($nouvelleImage, "public/images/script/rotate-".$fichier);
            break;
    
        case "image/jpeg":
            // On ouvre l'image
            imagejpeg($nouvelleImage, "public/images/script/rotate-".$fichier);
            break;
    }
    
    // On détruit les images dans la mémoire
    imagedestroy($nouvelleImage);

    $_SESSION["validate"] = "Success.";
    header("Location: tools");
}