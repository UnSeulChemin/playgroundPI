<?php

function uploader()
{
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0)
    {
        $allowed = [
            "jpg" => "image/jpeg",  // extension key, types mime valeur
            "jpeg" => "image/jpeg",
            "png" => "image/png"
        ];
    
        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
    
        // récupére l'extension
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
        // Si le type mime n'est pas dans le tableau on va pas plus loin
        if (!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed))
        {
            // Soit l'extension soit le type est incorrect
            die("Erreur: Format de fichier incorrect");
        }
    
        if ($filesize > 1024 * 1024) // 1 Mo
        {
            die("Fichier trop volumineux");
        }
    
        // On génére un nom unique
        $newname = md5(uniqid());
    
        //$newfilename = __DIR__ . "/public/images/uploads/$newname.$extension";
        $newfilename = "public/images/uploads/$newname.$extension";    

        // Prend le nom du fichier " $newname.$extension " et on le stock
        // Supprimer le fichier / une image " unlink(__DIR__/uploads/dfjfjfnj.svg); "
        // MAJ d'un avatar, ancien nom en base de données, on le récupere puis unlink();, 
        // puis move_uploaded_file sur le nouveau. DONE
        // ou on garde le meme nom puis puis move_uploaded_file apres le unlink
    
        
        // Déplace le fichier de tmp à uploads en renomant
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename))
        {
            die("L'upload à échoué");
        }
    
        // protege un fichier ; Interdit l'execution d'un fichier
        chmod($newfilename, 0644);
    }
}