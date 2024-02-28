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
		header("Location: login");
		exit;
		return false;
	}

	return true;
}
