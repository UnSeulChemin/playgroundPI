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
        
            if ($filesize > 1024 * 1024)
            {
                $message = "File too large.";
                return $message;
            }
        
            $newname = md5(uniqid());
            $newfilename = "public/images/upload/$newname.$extension";    

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename))
            {
                $message = "Upload failed.";
                return $message;
            }

            chmod($newfilename, 0644);

            $_SESSION["validate"] = "Upload success.";
        }

        else
        {
            $message = "Upload failed.";
            return $message;
        }
    }
}