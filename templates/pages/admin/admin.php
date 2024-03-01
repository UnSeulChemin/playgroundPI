<?php $title = "Admin"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Admin</h2>

    <section>
        <?php foreach($contacts as $contact): ?>
            <article>
                <h1><a href="admin/<?= $contact['id']; ?>"><?= strip_tags($contact['title']); ?></a></h1>
                <div><?= strip_tags($contact['content']); ?></div>
                <p>Publié le <?= $contact['created_at'] ?></p>
            </article>
        <?php endforeach; ?>
    </section>

</section>

<a href="resize">resize</a>
<a href="rotate">rotate</a>
<a href="crop">crop</a>
<a href="flip">flip</a>
<a href="wm">wm</a>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>