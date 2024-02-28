<?php

function contactUs()
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

function getContacts()
{
    require_once "src/lib/dbConnect.php";
    $database = dbConnect();

    $sql = "SELECT * FROM `contacts` ORDER BY `created_at` DESC";
    $requete = $database->query($sql);
    
    $contacts = $requete->fetchAll();
    return $contacts;
}

function getContact($getId)
{
    // if(isset($_GET['id']) && !empty($_GET['id']))

    // Pour éviter le else si pas d'id.. inveser la condition
    if(!isset($getId) || empty($getId))
    {
        header("Location: contact");
        exit;
    }

    $id = $getId;

    require_once "src/lib/dbConnect.php";
    $database = dbConnect();

    $sql = "SELECT * FROM `contacts` WHERE `id` = :id";
    $requete = $database->prepare($sql);
    $requete->bindValue("id", $id, PDO::PARAM_INT);
    $requete->execute();

    $contact = $requete->fetch();
    return $contact;

    if (!$contact)
    {
        // donne le code d'erreur 404
        http_response_code(404);
        echo "contact innexistant";
        exit;
    }

    $titre = strip_tags($contact["title"]);
}
