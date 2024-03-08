<?php
require_once "src/models/Upload.php";

function upload()
{
	$message = uploader();

	require_once "templates/pages/upload.php";
}