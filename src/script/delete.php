<?php

function deleteContact($id)
{
    require_once "src/lib/dbConnect.php";
    $database = dbConnect();

    $sql = "DELETE FROM `contacts` WHERE `id` = :id";
    $requete = $database->prepare($sql);
    $requete->bindValue("id", $id, PDO::PARAM_INT);
    $requete->execute();

    if (!$requete)
    {
        http_response_code(404);
        throw new Exception("Request Failed.");
    }

    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "")
    {
        $url = $_SERVER['HTTP_REFERER'];
    }
    
    else
    {
        $url = "./";
    }
    
    header("Location: ".$url);
}