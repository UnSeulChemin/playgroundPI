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

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>