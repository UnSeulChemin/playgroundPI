<?php
require_once "src/models/Upload.php";

function upload()
{
	$message = uploader();

	require('templates/pages/upload.php');
}