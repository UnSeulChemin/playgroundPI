<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>playgroundPI <?= $title ?? ""; ?></title>
</head>
<body>

<?php
require_once('_partials/_header.php');
echo $content;
require_once('_partials/_footer.php');
?>

</body>
</html>