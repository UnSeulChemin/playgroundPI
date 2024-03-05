<?php $title = "Contacts"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Contacts</h2>

    <?php foreach($contacts as $contact): ?>
        <article class="article-show">
            <p class="bold"><?= strip_tags($contact['title']); ?></p>
            <p><?= strip_tags($contact['content']); ?></p>
            <p><?= date('d/m/Y', strtotime($contact['created_at'])); ?></p>
            <div class="margin-bottom">
                <a class="link-form" href="<?= isset($_GET['id']) ? '../' : null; ?>contacts/<?= $contact['id']; ?>">Preview</a>
            </div>
            <div class="margin-bottom">
                <a class="link-form" href="<?= isset($_GET['id']) ? '../' : null; ?>mcontact/<?= $contact['id']; ?>">Modify</a>
            </div>
            <div>
                <a class="link-form" href="<?= isset($_GET['id']) ? '../' : null; ?>dcontact/<?= $contact['id']; ?>">Delete</a>
            </div>

        </article>
    <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>