<?php
require_once "src/models/Admin.php";

function admin()
{
	$contacts = getContacts();

	require('templates/pages/admin/admin.php');
}

function adminGetContact(int $getId)
{
	$contact = getContact($getId);

	require('templates/pages/admin/contactId.php');
}