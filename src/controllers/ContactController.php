<?php
require_once "src/models/Contact.php";

function contact()
{
	$message = contactUs();

	require_once "templates/pages/contact.php";
}