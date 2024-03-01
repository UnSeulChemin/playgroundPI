<?php $title = "Admin"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Admin</h2>

    <nav class="flex-center">
        <a class="link-menu" href="contacts">Contacts</a>
        <!-- <a href="">Upload</a> -->
        <!-- <a href="">Users</a> -->
    </nav>

</section>

<!-- <a href="resize">resize</a>
<a href="rotate">rotate</a>
<a href="crop">crop</a>
<a href="flip">flip</a>
<a href="wm">wm</a> -->

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>