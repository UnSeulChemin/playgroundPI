<?php
session_start();
require_once "src/global/functions.php";

require_once "src/Controllers/HomepageController.php";
require_once "src/Controllers/RegisterController.php";
require_once "src/Controllers/LoginController.php";
require_once "src/Controllers/LogoutController.php";

// var_dump($_SESSION["user"]);
// var_dump($_GET);

try
{
	
	if (empty($_GET['page']))
	{
		homepage();
	}

	if (!empty($_GET['page']))
	{

		if ($_GET['page'] === "register" && verifySessionUser())
		{
			register();
		}

		if ($_GET['page'] === "login" && verifySessionUser())
		{
			login();
		}

		if ($_GET['page'] === "logout")
		{
			logout();
		}

		homepage();
	}
}

catch (Exception $exception)
{
	die("Error :".$exception->getMessage());
}