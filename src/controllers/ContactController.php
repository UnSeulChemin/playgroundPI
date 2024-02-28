<?php
require_once "src/models/Contact.php";

function contact()
{
	contactUs();
	$contacts = getContacts();

	require('templates/pages/contact.php');
}

function contactId(int $getId)
{
	// functions
	$contact = getContact($getId);

	require('templates/pages/contactId.php');
}