<?php

function connection()
{
    if (!empty($_POST))
    {
        if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
        {
            $message = "";

            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $message = "Email already taken.";
                return $message;
            }

            if ($message === "")
            {
                require_once "src/lib/dbConnect.php";
                $database = dbConnect();

                $sql = "SELECT * FROM `users` WHERE `email` = :email";
                $requete = $database->prepare($sql);
                $requete->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
                $requete->execute();

                $user = $requete->fetch();

                if (!$user)
                {
                    $message = "User and / or password incorrect.";
                    return $message;
                }

                if(!password_verify($_POST["password"], $user["password"]))
                {
                    $message = "User and / or password incorrect.";
                    return $message;
                }

                if ($message === "")
                {
                    $_SESSION["user"] = [
                        "id" => $user["id"],
                        "name" => $user["name"],
                        "email" => $user["email"],
                        "roles" => $user["roles"]
                    ];
        
                    header("Location: ./");
                }
            }
        }

        else
        {
            $message = "Login failed.";
            return $message;
        }
    }
}