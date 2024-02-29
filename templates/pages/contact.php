<?php $title = "Contact"; ?>
<?php ob_start(); ?>

<section class="section-default">

    <h2>Contact</h2>

    <?php if (isset($message)): ?>
        <div class="warning-flash">
            <p><?= $message; unset($message); ?></p>
        </div>
    <?php endif; ?>

    <form method="post">
        <div>
            <input type="text" name="title" placeholder="Title">
        </div>
        <div>
            <input type="text" name="content" placeholder="Content">
        </div>
        <button class="link-form" type="submit">Contact</button>
    </form>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>