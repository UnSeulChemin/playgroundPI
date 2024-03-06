<?php $title = "Admin"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Admin</h2>

    <nav class="flex-center">
        <ul class="flex">
            <li class="margin-right-li"><a class="link-menu" href="contacts">Contacts</a></li>
            <li><a class="link-menu" href="uploads">Uploads</a></li>
        </ul>
    </nav>

</section>

<!-- <a href="resize">resize</a>
<a href="rotate">rotate</a>
<a href="crop">crop</a>
<a href="flip">flip</a>
<a href="wm">wm</a> -->

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>