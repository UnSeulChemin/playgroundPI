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
	// (IF), Index
	if (!isset($_GET['page'])):
		$_GET["page"] = "";
		homepage();
	endif;

	// Homepage, Empty $_GET["page"]
	if (empty($_GET['page'])):
		homepage();
	endif;

	// Router, $_GET["page"] 
	if (!empty($_GET['page'])):

		// Variable(s) Environment 
		$getPage = $_GET['page'];

		// Allowed Paths
		if (!in_array($getPage, $paths["visitor"]) && !in_array($getPage, $paths["user"]) && !in_array($getPage, $paths["admin"]) && verifyGetId($pathsIdAllowed)):
			if (!empty($_GET['id'])):
				header("Location: .././");
			?><?php else:
				header("Location: ./");
			endif;
		endif;

		// Router Visitor
		if (in_array($getPage, $paths["visitor"]) && emptySessionUser() && verifyGetId($pathsIdAllowed)):

			if ($getPage === "register"):
				register();
			endif;

			if ($getPage === "login"):
				login();
			endif;
		endif;

		// Router User
		if (in_array($getPage, $paths["user"]) && issetSessionUser() && verifyGetId($pathsIdAllowed)):

			if ($getPage === "logout"):
				logout();
			endif;

			if ($getPage === "shop"):

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

			if ($getPage === "contact"):
				contact();
			endif;

			if ($getPage === "upload"):
				upload();
			endif;

			if ($getPage === "profile"):
				profile();
			endif;
		endif;

		// Router Admin
		if (in_array($getPage, $paths["admin"]) && issetSessionUser() && issetSessionAdmin() && verifyGetId($pathsIdAllowed)):
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

		// LATER
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

	endif;
}

catch (Exception $exception)
{
	error404($exception->getMessage());
	exit;
}