<?php ob_start(); ?>

<h1>Profil de <?= $_SESSION["user"]["name"]; ?></h1>

<p>Pseudo : <?= $_SESSION["user"]["name"]; ?></p>
<p>Email : <?= $_SESSION["user"]["email"]; ?></p>


<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>