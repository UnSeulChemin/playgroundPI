<?php
require_once "src/models/Shop.php";

function shop()
{
	$shops = getShops();
    $countPage = getCount();

	require_once "templates/pages/shop.php";
}

function shopPaginate(int $getId)
{
	$shops = getShops($getId);
    $countPage = getCount();

	require_once "templates/pages/shop.php";
}