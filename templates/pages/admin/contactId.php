<?php ob_start(); ?>
<?= $title = "Contact"; ?>

<article>
    <h1><?= strip_tags($contact['title']); ?></h1>
    <p>Publié le <?= $contact['created_at'] ?></p>
    <div><?= strip_tags($contact['content']); ?></div>
</article>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>