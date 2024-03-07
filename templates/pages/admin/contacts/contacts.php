<?php $title = "Contacts"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Contacts</h2>

    <?php foreach($contacts as $contact): ?>
        <article class="article-content">
            <p class="bold"><?= strip_tags($contact['title']); ?></p>
            <p><?= strip_tags($contact['content']); ?></p>
            <p><?= date('d/m/Y', strtotime($contact['created_at'])); ?></p>
            <div class="margin-bottom">
                <a class="link-form" href="<?= isset($_GET['id']) ? '../' : null; ?>contacts/<?= $contact['id']; ?>">Preview</a>
            </div>
            <div class="margin-bottom">
                <a class="link-form" href="<?= isset($_GET['id']) ? '../' : null; ?>mcontacts/<?= $contact['id']; ?>">Modify</a>
            </div>
            <div>
                <a class="link-form" href="<?= isset($_GET['id']) ? '../' : null; ?>dcontacts/<?= $contact['id']; ?>">Delete</a>
            </div>

        </article>
    <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>