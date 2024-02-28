<?php ob_start(); ?>

<h1>Homepagee</h1>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>