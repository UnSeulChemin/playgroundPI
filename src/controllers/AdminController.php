<?php
require_once "src/models/Admin.php";

function admin()
{
	require('templates/pages/admin/admin.php');
}

function contacts()
{
	$contacts = getContacts();

	require('templates/pages/admin/contacts/contacts.php');
}

function contactId(int $getId)
{
	$contact = getContact($getId);

	require('templates/pages/admin/contacts/contactId.php');
}

function contactUpdate(int $getId)
{
	$contact = getContact($getId);
	$message = updateContact();

	require('templates/pages/admin/contacts/contactUpdate.php');	
}