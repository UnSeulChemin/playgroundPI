<?php
require_once "src/models/Contact.php";

function contact()
{
	$message = contactUs();

	require('templates/pages/contact.php');
}