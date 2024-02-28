<?php
require_once "src/models/Register.php";

function register()
{
	$message = registration();

	require('templates/pages/security/register.php');
}