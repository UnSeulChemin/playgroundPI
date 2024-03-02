<?php $title = "Upload"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Upload</h2>

    <?php if (isset($message)): ?>
        <div class="warning-flash">
            <p><?= $message; unset($message); ?></p>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION["validate"])): ?>
        <div class="success-flash">
            <p><?= $_SESSION["validate"]; unset($_SESSION["validate"]); ?></p>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="flex-center">
            <label class="label-file" for="file">Image</label>
            <input class="input-file" type="file" id="file" name="image">
        </div>
        <button class="link-form" type="submit">Envoyer</button>
    </form>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>