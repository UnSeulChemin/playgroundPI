<?php
require_once "src/models/Register.php";

function register()
{
	$message = registration();

	require_once "templates/pages/security/register.php";
}