<?php

// Verify the Session is empty
function emptySession()
{
	if (isset($_SESSION["user"]))
	{
		if (!empty($_GET["id"]))
		{
			header("Location: .././");
			exit;
			return false;
		}

		header("Location: ./");
        exit;
		return false;
	}

	return true;
}

// Verify the Session exist
function issetSessionUser()
{
	if (!isset($_SESSION["user"]))
	{
		if (!empty($_GET["id"]))
		{
			header("Location: ../login");
			exit;
			return false;
		}

		header("Location: login");
		exit;
		return false;
	}

	return true;
}

// Verify This is an Admin
function issetSessionAdmin()
{
	if ($_SESSION["user"]["roles"] !== '["ROLE_ADMIN"]')
	{
		if (!empty($_GET["id"]))
		{
			header("Location: ../login");
			exit;
			return false;
		}

		header("Location: login");
		exit;
		return false;
	}

	return true;
}

// Verify If There is a GET ID, That the Page is Allowed to Receive it
function verifyGetId($pathsIdAllowed)
{
	if (!empty($_GET["id"]))
	{
		if (!in_array($_GET["page"], $pathsIdAllowed["id"]))
		{
			header("Location: .././");
			exit;
			return false;
		}
	}

	return true;
}