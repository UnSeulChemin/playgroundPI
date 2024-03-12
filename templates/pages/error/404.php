<?php $title = "404"; ?>
<?php ob_start(); ?>

<section class="section-content">
    <h2>Fatal Error : <span class="bold"><?= $exception; ?></span></h2>
    <a class="link-form" href="javascript:history.go(-1)">Back</a>
</section>

<?php $content = ob_get_clean(); ?>
<?php require_once "templates/base.php"; ?>