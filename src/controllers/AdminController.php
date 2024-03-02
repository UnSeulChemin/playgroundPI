<?php
require_once "src/models/Admin.php";

function admin()
{
	require('templates/pages/admin/admin.php');
}

function contacts()
{
	$contacts = getContacts();

	require('templates/pages/admin/contacts.php');
}

function contactId(int $getId)
{
	$contact = getContact($getId);

	require('templates/pages/admin/contactId.php');
}

function modifyContact($id)
{
	$contact = getContact($id);
	$message = updateContact();

	require('templates/pages/admin/modifycontact.php');	
}