<?php ob_start(); ?>

<section class="section-content">

    <h2>PlaygroundPI</h2>
   
    <div class="div-content">
        <p>What's news?</p>
        <p>Register for free and see all news.</p>
    </div>

</section>

<?php $content = ob_get_clean(); ?>
<?php require_once('templates/base.php') ?>