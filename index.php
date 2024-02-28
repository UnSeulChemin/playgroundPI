<?php
session_start();
require_once "src/global/functions.php";
require_once "src/global/arrays.php";

require_once "src/Controllers/HomepageController.php";
require_once "src/Controllers/RegisterController.php";
require_once "src/Controllers/LoginController.php";
require_once "src/Controllers/LogoutController.php";
require_once "src/Controllers/UploadController.php";
require_once "src/Controllers/ProfileController.php";
require_once "src/Controllers/ContactController.php";

// var_dump($_SESSION);
var_dump($_GET);
var_dump($paths);

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

		if ($_GET['page'] === "register" && verifyNotLoggedUser() && verifyNotGetId($pathsIdAllowed))
		{
			register();
		}

		if ($_GET['page'] === "login" && verifyNotLoggedUser() && verifyNotGetId($pathsIdAllowed))
		{
			login();
		}

		if ($_GET['page'] === "logout" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed))
		{
			logout();
		}

		if ($_GET['page'] === "upload" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed))
		{
			upload();
		}

		if ($_GET['page'] === "profile" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed))
		{
			profile();
		}

		if ($_GET['page'] === "contact" && verifyLoggedUser())
		{
			if (!empty($_GET['id']))
			{
				$getId = $_GET['id'];

				contactId($getId);
			}

			else
			{
				contact();
			}
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