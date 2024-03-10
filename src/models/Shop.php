<?php

function getShops(int $getId = 1): array
{
    require_once "src/lib/dbConnect.php";
    $database = dbConnect();

	$eachPerPage = 8;
	$start = ($getId -1) * $eachPerPage;

    $sql = "SELECT * FROM `shop` ORDER BY `id` DESC LIMIT " . $start . ", " . $eachPerPage;
    $requete = $database->query($sql);

    $shops = [];
    while ($row = $requete->fetch())
    {
        $shop = [
            "id" => $row["id"],
            "name" => $row["name"],
            "extension" => $row["extension"],
            "description" => $row["description"],
            "created_at" => $row["created_at"]
        ];

        $shops[] = $shop;
    }

    return $shops;
}

function getCount()
{
    require_once "src/lib/dbConnect.php";
    $database = dbConnect();

    $sql = "SELECT COUNT(*) AS `count` FROM `shop`";
    $requete = $database->query($sql);

	if ($requete->rowCount() > 0)
	{
		$countTotal = $requete->fetch();
	}

	$eachPerPage = 8;
	$countPage = ceil($countTotal["count"] / $eachPerPage);

    return $countPage;
}