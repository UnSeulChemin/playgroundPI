<?php

function verifySessionUser()
{
	if (isset($_SESSION["user"]))
	{
		header("Location: ./");
        exit;
		return false;
	}

	return true;
}