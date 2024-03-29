<?php

function wm()
{
    $fichier = "default.jpg";
    $image = "public/images/script/$fichier";
    
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
    
    // On ouvre le logo
    $logo = imagecreatefrompng("public/images/script/logo.png");
    $infosLogo = getimagesize("public/images/script/logo.png");
    
    // On copie toute l'image source dans l'image destination en la réduisant
    imagecopyresampled(
        $imageSource, // Image de destination
        $logo, // Image de départ
        $infos[0] - $infosLogo[0] - 10, // Position en x du coin supérieur gauche dans l'image de destination
        $infos[1] - $infosLogo[1] - 10, // Position en y du coin supérieur gauche dans l'image de destination
        0, // Position en x du coin supérieur gauche dans l'image source
        0, // Position en y du coin supérieur gauche dans l'image source
        $infosLogo[0], // Largeur dans l'image de destination
        $infosLogo[1], // Hauteur dans l'image de destination
        $infosLogo[0], // Largeur dans l'image source
        $infosLogo[1] // Hauteur dans l'image source
    );
    
    // On enregistre la nouvelle image sur le serveur
    
    switch ($infos["mime"])
    {
        case "image/png":
            // On enregistre l'image
            imagepng($imageSource, "public/images/script/wm-".$fichier);
            break;
    
        case "image/jpeg":
            // On ouvre l'image
            imagejpeg($imageSource, "public/images/script/wm-".$fichier);
            break;
    }
    
    // On détruit les images dans la mémoire
    imagedestroy($imageSource);
    imagedestroy($logo);

    $_SESSION["validate"] = "Success.";
    header("Location: tools");
}