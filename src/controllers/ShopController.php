<?php
require_once "src/models/Shop.php";

function shop()
{
	$shops = getShop();
    $countPage = getCount();

	require('templates/pages/shop.php');
}

function shopPaginate(int $getId)
{
	$shops = getShop($getId);
    $countPage = getCount();

	require('templates/pages/shop.php');
}
