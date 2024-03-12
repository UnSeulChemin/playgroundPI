<?php $title = "Admin"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Admin</h2>

    <nav class="flex-center">
        <ul class="flex">
            <li class="margin-right-li"><a class="link-menu" href="contacts">Contacts</a></li>
            <li><a class="link-menu" href="tools">Tools</a></li>
        </ul>
    </nav>

</section>

<?php $content = ob_get_clean(); ?>
<?php require_once "templates/base.php"; ?>