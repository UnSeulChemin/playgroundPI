<?php

function getContacts()
{
    require_once "src/lib/dbConnect.php";
    $database = dbConnect();

    $sql = "SELECT * FROM `contacts` ORDER BY `created_at` DESC";
    $requete = $database->query($sql);
    
    $contacts = $requete->fetchAll();
    return $contacts;
}

function getContact(int $getId)
{
    if(!isset($getId) || empty($getId))
    {
        header("Location: ./");
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

    if (!$contact)
    {
        http_response_code(404);
        throw new Exception("Incorrect contact");
    }

    return $contact;
}

function updateContact()
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
    
            $sql = "UPDATE `contacts` SET `title` = :title, `content` = :content WHERE `id` = :id";
            $requete = $database->prepare($sql);
            $requete->bindValue(":title", $title, PDO::PARAM_STR);
            $requete->bindValue(":content", $content, PDO::PARAM_STR);
            $requete->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
            $requete->execute();

            if (!$requete)
            {
                http_response_code(404);
                throw new Exception("Request Failed.");
            }

            header("Location: ../contacts");
        }
    
        else
        {
            $message = "The form is incomplete.";
            return $message;
        }
    }
}