<?php ob_start(); ?>

<section class="section-profil">
    <h1>Homepage</h1>
    <p>blablabla</p>
    <p>blablabla</p>
</section>

<?php $content = ob_get_clean(); ?>
<?php require_once('templates/base.php') ?>