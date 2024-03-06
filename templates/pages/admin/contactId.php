<?php $title = "Contacts"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Contacts</h2>

    <article class="article-content">
        <p class="bold"><?= strip_tags($contact['title']); ?></p class="bold">
        <p><?= strip_tags($contact['content']); ?></p class="bold">
        <p><?= date('d/m/Y', strtotime($contact['created_at'])); ?></p>
        <a class="link-form" href="javascript:history.go(-1)">Back</a>
    </article>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>