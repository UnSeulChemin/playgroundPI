<?php $title = "Contacts"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Contacts</h2>

    <?php if (isset($message)): ?>
        <div class="warning-flash">
            <p><?= $message; unset($message); ?></p>
        </div>
    <?php endif; ?>

    <form method="post">
        <div>
            <input type="text" name="title" value="<?= strip_tags($contact["title"]); ?>" autofocus>
        </div>
        <div>
            <input type="text" name="content" value="<?= strip_tags($contact["content"]); ?>">
        </div>
        <button class="link-form" type="submit">Validate</button>
    </form>

</section>

<?php $content = ob_get_clean(); ?>
<?php require_once "templates/base.php"; ?>