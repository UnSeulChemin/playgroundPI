<?php
require_once "src/models/Upload.php";

function upload()
{
	uploader();

	require('templates/pages/upload.php');
}