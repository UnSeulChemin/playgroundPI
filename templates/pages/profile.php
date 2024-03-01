<?php $title = "Profile"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Welcome <span class="bold"><?= ucfirst($_SESSION["user"]["name"]); ?></span></h2>

    <div class="div-content">
        <p>Your email is <span class="bold"><?= $_SESSION["user"]["email"]; ?></span></p>
    </div>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>