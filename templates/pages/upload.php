<?php ob_start(); ?>
<?= $title = "Upload"; ?>

<h1>Ajout de fichier</h1>

<!-- Dès qu'il y a un input type file ; enctype="multipart/form-data"> -->
<form method="post" enctype="multipart/form-data">
    <div>
        <label for="fichier">Fichier</label>
        <input type="file" id="fichier" name="image">
        <!-- <input type="file" id="fichier" name="image[]" multiple> -->
    </div>
    <button type="submit">Envoyer</button>
</form>


<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>