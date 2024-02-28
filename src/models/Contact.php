<?php

function approach()
{
    if (!empty($_POST))
    {
        if (isset($_POST["title"], $_POST["content"]) && !empty($_POST["title"]) && !empty($_POST["content"]))
        {
            // proteger des failes XSS
            // On retire toute balise du title
            $title = strip_tags($_POST["title"]);
    
            // On neutralise toute balise du content (je les garde mais ne sont plus active)
            $content = htmlspecialchars($_POST["content"]);
    
            require_once "src/lib/dbConnect.php";
            $database = dbConnect();
    
            $sql = "INSERT INTO `contacts` (`title`, `content`) VALUES (:title, :content)";
            $requete = $database->prepare($sql);
            $requete->bindValue(":title", $title, PDO::PARAM_STR);
            $requete->bindValue(":content", $content, PDO::PARAM_STR);
    
            // execute return un bool
            if (!$requete->execute())
            {
                die("Une erreur est survenue");
            }
    
            // On récupére l'id de l'article (récupere l'id du dernier insert executer)
            $id = $database->lastInsertId();
            die("Article ajouté sous le numéro $id");
        }
    
        else
        {
            die("Le formulaire est imcomplet");
        }
    }
}