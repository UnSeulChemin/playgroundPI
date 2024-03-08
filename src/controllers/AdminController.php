<?php
require_once "src/models/Admin.php";

function admin()
{
	require_once "templates/pages/admin/admin.php";
}

function contacts()
{
	$contacts = getContacts();

	require_once "templates/pages/admin/contacts/contacts.php";
}

function contactId(int $getId)
{
	$contact = getContact($getId);

	require_once "templates/pages/admin/contacts/contactId.php";
}

function contactUpdate(int $getId)
{
	$contact = getContact($getId);
	$message = updateContact();

	require_once "templates/pages/admin/contacts/contactUpdate.php";	
}