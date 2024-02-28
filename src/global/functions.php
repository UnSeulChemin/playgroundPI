<?php

function verifySessionUser()
{
	if (isset($_SESSION["user"]))
	{
		header("Location: index");
        exit;
		return false;
	}

	return true;
}