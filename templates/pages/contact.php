<?php ob_start(); ?>
<?= $title = "Contact"; ?>

<h1>Ajouter un contact</h1>

<!-- POST = pour ajouter des informations en base de données -->
<form method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="content">Content</label>
        <textarea id="content" name="content"></textarea>
    </div>
    <button type="submit">Contact us</button>
</form>

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