<?php $title = "Contact"; ?>
<?php ob_start(); ?>

<section class="section-default">

    <h2>Contact</h2>

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

<h2>Show contact</h2>

<!-- Toujours une boucle apres foreach 
-- raccourcie pour éviter d'avoir l'accolage.. plus pratique / visible / propre
strip_tags : n'affiche pas le code html / js (= envoyer en base) sql gere pour date
-->

<section>
<?php foreach($contacts as $contact): ?>
    <article>
        <h1><a href="contact/<?= $contact['id']; ?>"><?= strip_tags($contact['title']); ?></a></h1>
        <div><?= strip_tags($contact['content']); ?></div>
        <p>Publié le <?= $contact['created_at'] ?></p>
    </article>
<?php endforeach; ?>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>