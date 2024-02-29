<?php $title = "Admin"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Admin</h2>

    <h2>Show contact</h2>

    <!-- Toujours une boucle apres foreach 
    -- raccourcie pour éviter d'avoir l'accolage.. plus pratique / visible / propre
    strip_tags : n'affiche pas le code html / js (= envoyer en base) sql gere pour date
    -->

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

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>