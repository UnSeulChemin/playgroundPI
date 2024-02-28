<?php

function registration()
{
    if (!empty($_POST))
    {
        if (isset($_POST["username"], $_POST["email"], $_POST["password"])
            && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
        {
            $name = strip_tags($_POST["username"]);
            $message = "";
    
            if (strlen($name) < 5)
            {
                $message = "Le name est trop court";
                return $message;
            }
    
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $message = "L'adresse email est incorrecte";
                return $message;
            }
    
            if ($message === "")
            {
                $password = password_hash($_POST["password"], PASSWORD_ARGON2I);
                // die($password);
    
                // ICI, add tous les autres controles
    
                require_once "src/lib/dbConnect.php";
                $database = dbConnect();

                // `` pour éviter les problème avec les noms réservées..
                $sql = "INSERT INTO `users` (`name`, `email`, `password`, `roles`) VALUES (:username, :email, '$password', '[\"ROLE_USER\"]')";
        
                $requete = $database->prepare($sql);
                $requete->bindValue(":username", $name, PDO::PARAM_STR);
                $requete->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
                $requete->execute();
    
                $id = $database->lastInsertId();
                
                $_SESSION["user"] = [
                    "id" => $id,
                    "name" => $name,
                    "email" => $_POST["email"],
                    "roles" => ["ROLE_USER"]
                ];
    
                header("Location: ./");
            }
        }
    
        else
        {
            $message = "Le formulaire est incomplet";
            return $message;
        }
    }    
}