<?php $title = "Upload"; ?>
<?php ob_start(); ?>

<section class="section-default">

    <h2>Upload</h2>

    <form method="post" enctype="multipart/form-data">
        <div>
            <input type="file" name="image" placeholder="file">
        </div>
        <button class="link-form" type="submit">Envoyer</button>
    </form>

</section>




<a href="resize">resize</a>
<a href="rotate">rotate</a>
<a href="crop">crop</a>
<a href="flip">flip</a>
<a href="wm">wm</a>


<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>