<?php
require_once "src/models/Login.php";

function login()
{
	$message = connection();

	require_once "templates/pages/security/login.php";
}