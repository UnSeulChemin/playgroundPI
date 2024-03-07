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
require_once "src/Controllers/ShopController.php";
require_once "src/Controllers/AdminController.php";
require_once "src/Controllers/ErrorController.php";

try
{
	// Empty $_GET["page"], Homepage
	if (empty($_GET['page'])):
		homepage();
	endif;

	// Router $_GET["page"] 
	if (!empty($_GET['page'])):

		// Variable(s) Environment 
		$getPage = $_GET['page'];

		if ($getPage === "index"):
			homepage();
		endif;

		if ($getPage === "register" && verifyNotLoggedUser() && verifyNotGetId($pathsIdAllowed)):
			register();
		endif;

		if ($getPage === "login" && verifyNotLoggedUser() && verifyNotGetId($pathsIdAllowed)):
			login();
		endif;

		if ($getPage === "logout" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed)):
			logout();
		endif;

		if ($getPage === "shop" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed)):

			if (!empty($_GET['id'])):

				if ($_GET['id'] > 2):
					header("Location: ../shop");
				endif;

				$getId = $_GET['id'];
				shopPaginate($getId);

			?><?php else:
				shop();
			endif;
		endif;

		if ($getPage === "contact" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed)):
			contact();
		endif;

		if ($getPage === "upload" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed)):
			upload();
		endif;

		if ($getPage === "profile" && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed)):
			profile();
		endif;

		if ($getPage === "rotate"):
			require_once "src/script/rotate.php";
			rotate();
		endif;

		if ($getPage === "resize"):
			require_once "src/script/resize.php";
			resize();
		endif;

		if ($getPage === "crop"):
			require_once "src/script/crop.php";
			crop();
		endif;

		if ($getPage === "flip"):
			require_once "src/script/flip.php";
			flip();
		endif;

		if ($getPage === "wm"):
			require_once "src/script/wm.php";
			wm();
		endif;
		
		if (!in_array($getPage, $paths["page"]) && !in_array($getPage, $paths["admin"])):
			header("Location: ./");
		endif;

		// Router Admin
		if (in_array($getPage, $paths["admin"]) && verifyLoggedUser() && verifyNotGetId($pathsIdAllowed) && verifyLoggedAdmin()):
			if ($getPage === "admin"):
				admin();
			endif;

			if ($getPage === "contacts"):
				if (!empty($_GET['id'])):
					$getId = $_GET['id'];
					contactId($getId);
				?><?php else:
				contacts();
				endif;
			endif;

			if ($getPage === "mcontacts"):
				$getId = $_GET['id'];
				contactUpdate($getId);
			endif;

			if ($getPage === "dcontacts"):
				$id = $_GET['id'];
				require_once "src/script/delete.php";
				contactDelete($id);
			endif;
		endif;

	endif;
}

catch (Exception $exception)
{
	error404($exception->getMessage());
	exit;
}