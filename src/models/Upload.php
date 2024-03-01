<?php

function uploader()
{
    if (!empty($_FILES["image"]))
    {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0)
        {
            $allowed = [
                "jpg" => "image/jpeg",
                "jpeg" => "image/jpeg",
                "png" => "image/png"
            ];
        
            $filename = $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
        
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed))
            {
                $message = "Incorrect file format.";
                return $message;
            }
        
            if ($filesize > 1024 * 1024) // 1 MO
            {
                $message = "File too large.";
                return $message;
            }
        
            $newname = md5(uniqid()); // Generate unique name
        
            $newfilename = "public/images/uploads/$newname.$extension";    

            // Prend le nom du fichier " $newname.$extension " et on le stock
            // Supprimer le fichier / une image " unlink(__DIR__/uploads/dfjfjfnj.svg); "
            // MAJ d'un avatar, ancien nom en base de données, on le récupere puis unlink();, 
            // puis move_uploaded_file sur le nouveau. DONE
            // ou on garde le meme nom puis puis move_uploaded_file apres le unlink
        
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename))
            {
                $message = "Upload failed.";
                return $message;
            }

            chmod($newfilename, 0644);

            $_SESSION["validate"] = "Success.";
        }

        else
        {
            $message = "The uploder is incomplete.";
            return $message;
        }
    }
}