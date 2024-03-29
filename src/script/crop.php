<?php

function crop()
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
    
    // On recadre l'image
    $nouvelleImage = imagecrop($imageSource, [
        "x" => 200,
        "y" => 200,
        "width" => 300,
        "height" => 150
    ]);
    
    switch ($infos["mime"])
    {
        case "image/png":
            // On enregistre l'image
            imagepng($nouvelleImage, "public/images/script/crop-".$fichier);
            break;
    
        case "image/jpeg":
            // On ouvre l'image
            imagejpeg($nouvelleImage, "public/images/script/crop-".$fichier);
            break;
    }
    
    // On détruit les images dans la mémoire
    imagedestroy($nouvelleImage);

    $_SESSION["validate"] = "Success.";
    header("Location: tools");
}