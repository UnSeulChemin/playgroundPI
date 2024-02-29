<?php $title = "Profile"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <div class="div-content">
        <p>Welcome <span class="bold"><?= ucfirst($_SESSION["user"]["name"]); ?></span></p>
        <p>Your email is <span class="bold"><?= $_SESSION["user"]["email"]; ?></span></p>
    </div>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>