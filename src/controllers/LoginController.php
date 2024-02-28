<?php
require_once "src/models/Login.php";

function login()
{
	$message = connection();

	require('templates/pages/security/login.php');
}