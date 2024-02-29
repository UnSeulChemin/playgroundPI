<?php

function verifyNotLoggedUser()
{
	if (isset($_SESSION["user"]))
	{
		header("Location: ./");
        exit;
		return false;
	}

	return true;
}

function verifyLoggedUser()
{
	if (!isset($_SESSION["user"]))
	{
		if (!empty($_GET['id']))
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

function verifyNotGetId($pathsIdAllowed)
{
	if (!empty($_GET['id']))
	{
		if (!in_array($_GET['page'], $pathsIdAllowed["id"]))
		{
			header("Location: .././");
			exit;
			return false;
		}
	}

	return true;
}

function verifyLoggedAdmin()
{
	if ($_SESSION["user"]["roles"] !== '["ROLE_ADMIN"]')
	{
		if (!empty($_GET['id']))
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
