<?php
session_start();
require_once "src/global/functions.php";
require_once "src/global/arrays.php";

require_once "src/Controllers/HomepageController.php";
require_once "src/Controllers/RegisterController.php";
require_once "src/Controllers/LoginController.php";
require_once "src/Controllers/LogoutController.php";
require_once "src/Controllers/UploadController.php";

// var_dump($_SESSION["user"]);
var_dump($_GET);
var_dump($paths["page"]);

try
{
	if (empty($_GET['page']))
	{
		homepage();
	}

	if (!empty($_GET['page']))
	{
		if ($_GET['page'] === "index")
		{
			homepage();
		}

		if ($_GET['page'] === "register" && verifyNotLoggedUser())
		{
			register();
		}

		if ($_GET['page'] === "login" && verifyNotLoggedUser())
		{
			login();
		}

		if ($_GET['page'] === "logout" && verifyLoggedUser())
		{
			logout();
		}

		if ($_GET['page'] === "upload" && verifyLoggedUser())
		{
			upload();
		}

		if (!in_array($_GET['page'], $paths["page"]))
		{
			header("Location: ./");
		}
	}
}

catch (Exception $exception)
{
	die("Error :".$exception->getMessage());
}