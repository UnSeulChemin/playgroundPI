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
                $message = "Name too short.";
                return $message;
            }

            if (strlen($name) > 12)
            {
                $message = "Name too long.";
                return $message;
            }
    
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $message = "Incorrect email format.";
                return $message;
            }

            require_once "src/lib/dbConnect.php";
            $database = dbConnect();

            $sql = "SELECT * FROM `users` WHERE email = :email";
            $requete = $database->prepare($sql);
            $requete->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
            $requete->execute();

            if (!$requete->rowCount() == 0)
            {
                $message = "Email already taken.";
                return $message;
            }

            // at least 5 characters, at least 1 numeric character, at least 1 lowercase letter,
            // at least 1 uppercase letter, at least 1 special character.
            $passwordPattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?([^\w\s]|[_])).{5,}$/";
			
            if (!preg_match($passwordPattern, $_POST["password"]))
            {
                $message = "Password not enough strong.";
                return $message;
            }
    
            if ($message === "")
            {
                $password = password_hash($_POST["password"], PASSWORD_ARGON2I);

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
            $message = "Form Incorrect.";
            return $message;
        }
    }    
}