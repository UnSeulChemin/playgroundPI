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
        echo "Incorrect contact";
        exit;
    }

    return $contact;
}