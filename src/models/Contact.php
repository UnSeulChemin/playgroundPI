<?php

function contactUs()
{
    if (!empty($_POST))
    {
        if (isset($_POST["title"], $_POST["content"]) && !empty($_POST["title"]) && !empty($_POST["content"]))
        {
            $title = strip_tags($_POST["title"]);
            $content = htmlspecialchars($_POST["content"]);
            $message = "";
    
            require_once "src/lib/dbConnect.php";
            $database = dbConnect();
    
            $sql = "INSERT INTO `contacts` (`title`, `content`) VALUES (:title, :content)";
            $requete = $database->prepare($sql);
            $requete->bindValue(":title", $title, PDO::PARAM_STR);
            $requete->bindValue(":content", $content, PDO::PARAM_STR);

            if (!$requete->execute())
            {
                $message = "An error has occurred.";
                return $message;
            }

            $_SESSION["validate"] = "Success.";
        }
    
        else
        {
            $message = "The form is incomplete.";
            return $message;
        }
    }
}
