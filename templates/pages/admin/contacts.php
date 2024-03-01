<?php $title = "Contacts"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Contacts</h2>

    <section>
        <?php foreach($contacts as $contact): ?>
            <article>
                <h1><a href="contacts/<?= $contact['id']; ?>"><?= strip_tags($contact['title']); ?></a></h1>
                <div><?= strip_tags($contact['content']); ?></div>
                <p>Publié le <?= $contact['created_at'] ?></p>
            </article>
        <?php endforeach; ?>
    </section>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>