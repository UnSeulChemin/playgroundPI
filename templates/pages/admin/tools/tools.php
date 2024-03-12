<?php $title = "Tools"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Tools</h2>

    <?php if (isset($_SESSION["validate"])): ?>
        <div class="success-flash">
            <p><?= $_SESSION["validate"]; unset($_SESSION["validate"]); ?></p>
        </div>
    <?php endif; ?>

    <nav class="flex-center">
        <a class="link-form margin-right-li" href="tresize">resize</a>
        <a class="link-form margin-right-li" href="trotate">rotate</a>
        <a class="link-form margin-right-li" href="tcrop">crop</a>
        <a class="link-form margin-right-li" href="tflip">flip</a>
        <a class="link-form" href="twm">wm</a>
    </nav>

</section>

<?php $content = ob_get_clean(); ?>
<?php require_once "templates/base.php"; ?>