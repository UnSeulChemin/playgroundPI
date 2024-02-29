<?php $title = "Register"; ?>
<?php ob_start(); ?>

<section class="section-default">

    <h2>Register</h2>

    <?php if (isset($message)): ?>
        <p><?= $message; unset($message); ?></p>
    <?php endif; ?>

    <form method="post">
        <div>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <button class="link-form" type="submit">Register</button>
    </form>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>